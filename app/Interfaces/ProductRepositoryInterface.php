<?php

namespace App\Interfaces;

interface ProductRepositoryInterface
{
    public function getAllProduct(?int $perPage = null, ?string $search = null, ?string $category = null);

    public function getAllFavoriteProduct(int $limit = 2);

    public function getProductById(string $id);

    public function getProductBySlug(string $slug);

    public function createProduct(array $data);

    public function updateProduct(array $data, string $id);

    public function updateProductStock(string $id, int $stock);

    public function updateStatusActive(string $productId, bool $isActive);

    public function updateStatusFavorite(string $productId, bool $isFavorite);

    public function updateStatusDelivery(string $productId, string $statusDelivery);

    public function deleteProduct(string $id);
}
