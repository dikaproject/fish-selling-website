<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
        /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->paragraph(),
            'thumbnail' => UploadedFile::fake()->image('thumbnail.jpg'),
            'image' => UploadedFile::fake()->image('image.jpg'),
            'price' => $this->faker->randomNumber(5),
            'stock' => $this->faker->randomNumber(2),
            'is_favorite' => $this->faker->boolean(),
            'is_active' => $this->faker->boolean(true),
        ];
    }
}
