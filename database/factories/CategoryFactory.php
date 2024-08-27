<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category_name = fake()->sentence(rand(1,2), false);

        return [
            // definisikan beberapa fields untuk factory ini
            'category_name' => $category_name,
            'slug' => Str::slug($category_name)
        ];
    }
}
