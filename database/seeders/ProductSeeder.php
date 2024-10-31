<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Helpers\ImageHelper\ImageHelper;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imageHelper = new ImageHelper();

        for ($i = 1; $i <= 10; $i++) {
            $productCategory = ProductCategory::inRandomOrder()->first();

            Product::factory()
                ->for($productCategory)
                ->create([
                    'thumbnail' => $imageHelper->createDummyImageWithTextSizeAndPosition(1920, 1080, 'center', 'center', 'random', 'medium')->store('assets/product/thumbnail', 'public'),
                    'image' => $imageHelper->createDummyImageWithTextSizeAndPosition(1920, 1080, 'center', 'center', 'random', 'medium')->store('assets/product/image', 'public'),
            ]);
        }
    }
}
