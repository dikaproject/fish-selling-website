<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;


class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productCategories = [
            'Ikan Laut',
            'Ikan Air Tawar',
            'Ikan Olahan',
            'Kerang dan Sejenisnya',
        ];

        foreach ($productCategories as $productCategory) {
            ProductCategory::factory()->create([
                'name' => $productCategory
            ]);
        }
    }
}
