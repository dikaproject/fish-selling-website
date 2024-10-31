<?php

namespace App\Interfaces;

interface ProductCategoryRepositoryInterface
{
    public function getAllProductCategory(?int $perPage = null, ?string $search = null);

    public function getProductCategoryById(string $id);

    public function createProductCategory(array $data);

    public function updateProductCategory(array $data, string $id);

    public function deleteProductCategory(string $id);
}
