<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use NunoMaduro\Collision\Writer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $env = config('app.env');

        $this->call([
            RoleSeeder::class,
            AccountSeeder::class,
            WriterSeeder::class,

        ]);

        if ($env === 'local') {
            $this->call([
                ArticleTagSeeder::class,
                ArticleCategorySeeder::class,
                ArticleSeeder::class,
                ProductCategorySeeder::class,
                ProductSeeder::class,
            ]);
        }
    }
}
