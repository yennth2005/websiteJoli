<?php

namespace Database\Factories;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CartItem>
 */
class CartItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cart_id' => Cart::factory(), // Tạo một cart ngẫu nhiên nếu chưa có
            'product_id' => Product::factory(), // Tạo một product ngẫu nhiên nếu chưa có
            'quantity' => fake()->numberBetween(1, 3),
        ];
    }
}