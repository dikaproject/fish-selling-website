<?php

namespace App\Http\Controllers\Web\Transactions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Midtrans\Snap;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Product;
use App\Models\ShippingAddress;
use App\Models\Cart;

class TransactionController extends Controller
{
    /**
     * Menampilkan halaman checkout.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewCheckout()
    {
        $user = Auth::user();

        if ($user) {
            // Untuk pengguna yang sudah login, ambil item keranjang dari database
            $cartItems = Cart::with('product')
                ->where('user_id', $user->id)
                ->get();

            // Ambil alamat pengiriman pengguna
            $shippingAddresses = ShippingAddress::where('user_id', $user->id)->get();
        } else {
            // Untuk pengguna guest, ambil item keranjang dari session
            $cartSession = session()->get('cart', []);
            $cartItems = collect();

            foreach ($cartSession as $item) {
                $product = Product::find($item['product_id']);
                if ($product) {
                    $cartItem = new Cart();
                    $cartItem->id = null;
                    $cartItem->product_id = $product->id;
                    $cartItem->product = $product;
                    $cartItem->quantity = $item['quantity'];

                    $cartItems->push($cartItem);
                }
            }

            // Guest users harus mengisi alamat pengiriman saat checkout
            $shippingAddresses = collect();
        }

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.view')->with('error', 'Keranjang Anda kosong.');
        }

        return view('pages.user.transaksi.checkout', compact('cartItems', 'shippingAddresses'));
    }

    /**
     * Memproses checkout dan membuat transaksi baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {
        // Validasi input
        $request->validate([
            'address_id' => 'nullable|uuid',
            'recipient_name' => 'required_if:address_id,null',
            'phone' => 'required_if:address_id,null',
            'address_line1' => 'required_if:address_id,null',
            'city' => 'required_if:address_id,null',
            'state' => 'required_if:address_id,null',
            'postal_code' => 'required_if:address_id,null',
            'country' => 'required_if:address_id,null',
        ]);

        $user = Auth::user();

        if ($user) {
            // Untuk pengguna yang sudah login, ambil item keranjang dari database
            $cartItems = Cart::with('product')
                ->where('user_id', $user->id)
                ->get();
        } else {
            // Untuk pengguna guest, ambil item keranjang dari session
            $cartSession = session()->get('cart', []);
            $cartItems = collect();

            foreach ($cartSession as $item) {
                $product = Product::find($item['product_id']);
                if ($product) {
                    $cartItem = new Cart();
                    $cartItem->id = null;
                    $cartItem->product_id = $product->id;
                    $cartItem->product = $product;
                    $cartItem->quantity = $item['quantity'];

                    $cartItems->push($cartItem);
                }
            }
        }

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.view')->with('error', 'Keranjang Anda kosong.');
        }

        // Buat transaksi baru
        $transaction = new Transaction();
        $transaction->id = Str::uuid();
        $transaction->transaction_code = 'TRX-' . strtoupper(Str::random(10));
        $transaction->user_id = $user ? $user->id : null;
        $transaction->amount = 0; // Akan di-update nanti
        $transaction->status = 'pending';
        $transaction->transaction_date = now();
        $transaction->save();

        $totalAmount = 0;

        // Simpan atau gunakan alamat pengiriman
        if ($request->address_id) {
            // Gunakan alamat yang sudah ada
            $shippingAddress = ShippingAddress::findOrFail($request->address_id);
        } else {
            // Simpan alamat baru
            $shippingAddress = new ShippingAddress();
            $shippingAddress->id = Str::uuid();
            $shippingAddress->user_id = $user ? $user->id : null;
            $shippingAddress->transaction_id = $transaction->id;
            $shippingAddress->recipient_name = $request->input('recipient_name');
            $shippingAddress->phone = $request->input('phone');
            $shippingAddress->address_line1 = $request->input('address_line1');
            $shippingAddress->address_line2 = $request->input('address_line2');
            $shippingAddress->city = $request->input('city');
            $shippingAddress->state = $request->input('state');
            $shippingAddress->postal_code = $request->input('postal_code');
            $shippingAddress->country = $request->input('country', 'Indonesia');
            $shippingAddress->save();
        }

        // Simpan shipping_address_id di transaksi
        $transaction->shipping_address_id = $shippingAddress->id;
        $transaction->save();

        // Simpan detail transaksi dan kurangi stok produk
        foreach ($cartItems as $item) {
            $product = $item->product;

            // Konversi kuantitas berdasarkan unit produk
            $quantity = $item->quantity;

            // Simpan detail transaksi
            $detail = new TransactionDetail();
            $detail->id = Str::uuid();
            $detail->transaction_id = $transaction->id;
            $detail->product_id = $product->id;
            $detail->quantity = $quantity; // Kuantitas sesuai input
            $detail->price = $product->price;
            $detail->save();

            $totalAmount += $product->price * $quantity;

            // Kurangi stok produk
            $stockReduction = $quantity;

            if ($product->unit == 'kilogram') {
                $stockReduction = $quantity * 1000; // Konversi ke gram
            } elseif ($product->unit == 'ton') {
                $stockReduction = $quantity * 1000000; // Konversi ke gram
            }

            if ($product->stock < $stockReduction) {
                // Jika stok tidak mencukupi, batalkan transaksi
                return redirect()->route('cart.view')->with('error', 'Stok produk ' . $product->name . ' tidak mencukupi.');
            }

            $product->stock -= $stockReduction;
            $product->save();
        }

        // Update total amount transaksi
        $transaction->amount = $totalAmount;
        $transaction->save();

        // Hapus item di keranjang setelah checkout
        if ($user) {
            Cart::where('user_id', $user->id)->delete();
        } else {
            session()->forget('cart');
        }

        // Konfigurasi Midtrans Snap
        $midtransParams = [
            'transaction_details' => [
                'order_id' => $transaction->transaction_code,
                'gross_amount' => $transaction->amount,
            ],
            'customer_details' => [
                'first_name' => $user ? $user->name : $shippingAddress->recipient_name,
                'email' => $user ? $user->email : $request->input('email'),
                'phone' => $shippingAddress->phone,
                'shipping_address' => [
                    'first_name' => $shippingAddress->recipient_name,
                    'phone' => $shippingAddress->phone,
                    'address' => $shippingAddress->address_line1,
                    'city' => $shippingAddress->city,
                    'postal_code' => $shippingAddress->postal_code,
                    'country_code' => 'IDN',
                ],
            ],
            'item_details' => [],
        ];

        // Tambahkan item_details
        foreach ($transaction->details as $detail) {
            $product = $detail->product;
            $itemDetail = [
                'id' => $product->id,
                'price' => $detail->price,
                'quantity' => $detail->quantity,
                'name' => $product->name,
            ];
            $midtransParams['item_details'][] = $itemDetail;
        }

        // Generate Snap Token
        $snapToken = Snap::getSnapToken($midtransParams);

        // Kirim token ke view
        return view('pages.user.transaksi.pay', compact('snapToken', 'transaction'));
    }

    /**
     * Menangani notifikasi dari Midtrans.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function notificationHandler(Request $request)
    {
        $notif = new \Midtrans\Notification();

        $transactionStatus = $notif->transaction_status;
        $paymentType = $notif->payment_type;
        $orderId = $notif->order_id;
        $fraudStatus = $notif->fraud_status;

        // Cari transaksi berdasarkan order_id
        $transaction = Transaction::where('transaction_code', $orderId)->first();

        if (!$transaction) {
            return response()->json(['message' => 'Transaction not found'], 404);
        }

        if ($transactionStatus == 'capture') {
            if ($paymentType == 'credit_card') {
                if ($fraudStatus == 'challenge') {
                    $transaction->status = 'pending';
                } else {
                    $transaction->status = 'paid';
                }
            }
        } elseif ($transactionStatus == 'settlement') {
            $transaction->status = 'paid';
        } elseif ($transactionStatus == 'pending') {
            $transaction->status = 'pending';
        } elseif ($transactionStatus == 'deny') {
            $transaction->status = 'failed';
        } elseif ($transactionStatus == 'expire') {
            $transaction->status = 'expired';
        } elseif ($transactionStatus == 'cancel') {
            $transaction->status = 'canceled';
        }

        $transaction->save();

        return response()->json(['message' => 'Notification handled']);
    }

    /**
     * Menampilkan halaman pembayaran.
     *
     * @param  string  $transactionId
     * @return \Illuminate\Http\Response
     */
    public function pay($transactionId)
    {
        $transaction = Transaction::findOrFail($transactionId);

        // Generate ulang Snap Token jika diperlukan
        $midtransParams = [
            'transaction_details' => [
                'order_id' => $transaction->transaction_code,
                'gross_amount' => $transaction->amount,
            ],
            // Tambahkan customer_details dan item_details seperti sebelumnya
        ];

        $snapToken = Snap::getSnapToken($midtransParams);

        return view('transactions.pay', compact('snapToken', 'transaction'));
    }

    /**
     * Menampilkan halaman sukses pembayaran.
     *
     * @return \Illuminate\Http\Response
     */
    public function paymentSuccess()
    {
        return view('pages.user.transaksi.success');
    }

    /**
     * Menampilkan halaman pembayaran pending.
     *
     * @return \Illuminate\Http\Response
     */
    public function paymentPending()
    {
        return view('pages.user.transaksi.pending');
    }

    /**
     * Menampilkan halaman pembayaran gagal.
     *
     * @return \Illuminate\Http\Response
     */
    public function paymentFailed()
    {
        return view('pages.user.transaksi.failed');
    }
}
