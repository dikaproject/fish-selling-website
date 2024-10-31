<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    public function createOrder(Request $request)
    {
        Log::info('createOrder called', ['request' => $request->all()]);

        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'crypto_currency' => 'required|in:ETH,BTC,USDT,TON',
            'user_wallet_address' => 'required',
            'amount' => 'required|numeric',
            'transaction_hash' => 'required',
        ]);

        $product = Product::findOrFail($validated['product_id']);

        $order = Order::create([
            'product_id' => $product->id,
            'user_wallet_address' => $validated['user_wallet_address'],
            'crypto_currency' => $validated['crypto_currency'],
            'amount' => $validated['amount'],
            'transaction_hash' => $validated['transaction_hash'],
            'status' => 'pending',
        ]);

        Log::info('Order created', ['order' => $order]);

        return response()->json(
            [
                'success' => true,
                'order' => $order,
            ],
            201,
        );
    }

    public function completeFreeOrder(Request $request)
{
    try {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_wallet_address' => 'required',
        ]);

        $product = Product::findOrFail($validated['product_id']);

        $order = Order::create([
            'product_id' => $product->id,
            'user_wallet_address' => $validated['user_wallet_address'],
            'crypto_currency' => 'NONE | FREE TEST',
            'amount' => 0,
            'status' => 'completed',
            'transaction_hash' => 'FREE TEST',
        ]);

        Log::info('Free order created', ['order' => $order]);

        return response()->json(
            [
                'success' => true,
                'message' => 'Pembayaran Gratis Berhasil',
                'order' => $order,
            ],
            201
        );
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Return validation errors as JSON
        return response()->json([
            'success' => false,
            'message' => 'Validation failed',
            'errors' => $e->errors(),
        ], 422);
    } catch (\Exception $e) {
        // Return other errors as JSON
        return response()->json([
            'success' => false,
            'message' => 'An error occurred',
            'error' => $e->getMessage(),
        ], 500);
    }
}


    public function getCryptoRates()
    {
        try {
            $client = new Client();
            $response = $client->get('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin,ethereum,tether,the-open-network&vs_currencies=idr');
            $rates = json_decode($response->getBody(), true);

            return response()->json([
                'success' => true,
                'rates' => [
                    'ETH' => $rates['ethereum']['idr'] ?? null,
                    'BTC' => $rates['bitcoin']['idr'] ?? null,
                    'USDT' => $rates['tether']['idr'] ?? null,
                    'TON' => $rates['the-open-network']['idr'] ?? null,
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Failed to fetch crypto rates',
                    'error' => $e->getMessage(),
                ],
                500,
            );
        }
    }
}
