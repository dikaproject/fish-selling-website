<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('is_active', true)->get();
        return view('products.index', compact('products'));
    }

    public function buy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->price == 0) {
            return response()->json(['message' => 'Pembayaran Gratis Berhasil'], 200);
        }

        return view('products.buy', compact('product'));
    }
}
