<?php

namespace App\Repositories;

use App\Interfaces\ProductCategoryRepositoryInterface;
use App\Models\ProductCategory;


class ProductCategoryRepository implements ProductCategoryRepositoryInterface
{
    public function getAllProductCategory(?int $perPage = null, ?string $search = null)
    {
        return ProductCategory::all();
    }

    public function getProductCategoryById(string $id)
    {
        return ProductCategory::findOrFail($id);
    }

    public function createProductCategory(array $data)
    {
        return ProductCategory::create($data);
    }

    public function updateProductCategory(array $data, string $id)
    {
        $productCategory = $this->getProductCategoryById($id);
        $productCategory->update($data);

        return $productCategory;
    }

    public function deleteProductCategory(string $id)
    {
        $productCategory = $this->getProductCategoryById($id);
        $productCategory->delete();

        return $productCategory;
    }
}
