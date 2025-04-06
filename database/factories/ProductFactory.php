<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Color;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $price = fake()->randomFloat(2, 10, 1000);
        $salePrice = fake()->optional()->randomFloat(2, 5, $price - 1);

        return [
            'category_id' => Category::factory(), // Tạo một category ngẫu nhiên nếu chưa có
            'name' => fake()->sentence(3),
            'color_id' => Color::factory(),
            'image' => fake()->imageUrl(640, 480, 'products', true),
            'description' => fake()->paragraph(3),
            'price' => $price,
            'sale_price' => $salePrice,
            'stock' => fake()->numberBetween(0, 100),
        ];
    }
}