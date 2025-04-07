<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Color; // Thêm use cho model Color
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory(5)->create()->each(function ($product) {
            // Gán ngẫu nhiên một category cho sản phẩm
            $category = Category::inRandomOrder()->first();
            if ($category) {
                $product->category_id = $category->id;
            }

            // Gán ngẫu nhiên một màu sắc cho sản phẩm
            $color = Color::inRandomOrder()->first();
            if ($color) {
                $product->color_id = $color->id;
            }

            $product->save();
        });
    }
}