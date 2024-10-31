<?php

namespace App\Http\Controllers\Web\Carts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Menambahkan produk ke keranjang belanja.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function addToCart(Request $request)
     {
         // Validasi input
         $request->validate([
             'product_id' => 'required|uuid',
             'quantity' => 'required|integer|min:1',
         ]);

         $product = Product::findOrFail($request->product_id);

         // Konversi kuantitas berdasarkan unit produk
         $quantity = $request->quantity;

         // Dapatkan pengguna yang sedang login
         $user = Auth::user();

         if ($user) {
             // Untuk pengguna yang sudah login, simpan keranjang di database
             // Cek apakah produk sudah ada di keranjang
             $cartItem = Cart::where('user_id', $user->id)
                 ->where('product_id', $product->id)
                 ->first();

             if ($cartItem) {
                 // Update kuantitas
                 $cartItem->quantity += $quantity;
                 $cartItem->save();
             } else {
                 // Tambahkan item baru ke keranjang
                 $cartItem = new Cart();
                 $cartItem->id = Str::uuid();
                 $cartItem->user_id = $user->id;
                 $cartItem->product_id = $product->id;
                 $cartItem->quantity = $quantity;
                 $cartItem->save();
             }
         } else {
             // Untuk pengguna guest, simpan keranjang di session
             $cart = session()->get('cart', []);

             $productId = $product->id;

             if (isset($cart[$productId])) {
                 $cart[$productId]['quantity'] += $quantity;
             } else {
                 $cart[$productId] = [
                     'product_id' => $productId,
                     'name' => $product->name,
                     'price' => $product->price,
                     'quantity' => $quantity,
                     'unit' => $product->unit,
                 ];
             }

             session()->put('cart', $cart);
         }

         return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang.');
     }

    /**
     * Menampilkan isi keranjang belanja.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewCart()
    {
        // Dapatkan pengguna yang sedang login
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

        return view('pages.user.transaksi.carts', compact('cartItems'));
    }

    /**
     * Mengupdate kuantitas item di keranjang belanja.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateCart(Request $request)
    {
        // Validasi input
        $request->validate([
            'product_id' => 'required|uuid',
            'quantity' => 'required|integer|min:1',
        ]);

        $productId = $request->product_id;

        $user = Auth::user();

        if ($user) {
            // Untuk pengguna yang sudah login, update keranjang di database
            $cartItem = Cart::where('user_id', $user->id)
                ->where('product_id', $productId)
                ->firstOrFail();

            $cartItem->quantity = $request->quantity;
            $cartItem->save();
        } else {
            // Untuk pengguna guest, update keranjang di session
            $cart = session()->get('cart', []);

            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] = $request->quantity;
                session()->put('cart', $cart);
            }
        }

        return redirect()->back()->with('success', 'Kuantitas produk berhasil diperbarui.');
    }

    /**
     * Menghapus item dari keranjang belanja.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function removeFromCart(Request $request)
    {
        // Validasi input
        $request->validate([
            'product_id' => 'required|uuid',
        ]);

        $productId = $request->product_id;

        $user = Auth::user();

        if ($user) {
            // Untuk pengguna yang sudah login, hapus item dari database
            $cartItem = Cart::where('user_id', $user->id)
                ->where('product_id', $productId)
                ->first();

            if ($cartItem) {
                $cartItem->delete();
            }
        } else {
            // Untuk pengguna guest, hapus item dari session
            $cart = session()->get('cart', []);

            if (isset($cart[$productId])) {
                unset($cart[$productId]);
                session()->put('cart', $cart);
            }
        }

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang.');
    }
}
