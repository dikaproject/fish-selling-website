<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductRepository implements ProductRepositoryInterface
{

    public function getAllProduct(?int $perPage = null, ?string $search = null, ?string $category = null)
    {
        $product = Product::query();

        if ($search) {
            $product->where('name', 'like', '%' . $search . '%');
        }

        $product->orderBy('is_active', 'desc');

        if ($category) {
            $product->where('category_id', $category);
        }

        if ($perPage) {
            return $product->lastest()->paginate($perPage);
        }

        return $product->get();
    }

    public function getAllFavoriteProduct(int $limit = 2)
    {
        return Product::where('is_favorite', true)->limit($limit)->get();
    }

    public function getProductById(string $id)
    {
        return Product::findOrFail($id);
    }

    public function getProductBySlug(string $slug)
    {
        return Product::where('slug', $slug)->first();
    }

    public function createProduct(array $data)
    {
        return DB::transaction(function () use ($data) {
            $product = Product::create($data);

            return $product;
        });
    }

    public function updateProduct(array $data, string $id)
    {
        return DB::transaction(function () use ($data, $id) {
            $product = $this->getProductById($id);
            $product->update($data);

            return $product;
        });
    }

    public function updateProductStock(string $id, int $stock)
    {
        return DB::transaction(function () use ($id, $stock) {
            $product = $this->getProductById($id);
            $product->stock = $stock;
            $product->save();

            return $product;
        });
    }

    public function updateStatusActive(string $productId, bool $isActive)
{
    $product = Product::findOrFail($productId);
    $product->is_active = $isActive;
    $product->save();
}

public function updateStatusFavorite(string $productId, bool $isFavorite)
{
    $product = Product::findOrFail($productId);
    $product->is_favorite = $isFavorite;
    $product->save();
}

    public function updateStatusDelivery(string $productId, string $statusDelivery)
    {
        $product = Product::findOrFail($productId);

        $product->status_delivery = $statusDelivery;

        $product->save();
    }

    public function deleteProduct(string $id)
    {
        return DB::transaction(function () use ($id) {
            $product = $this->getProductById($id);
            $product->delete();

            return $product;
        });
    }
}
