<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function search(Request $request)
    {
        // Eager load quan hệ color
        $query = Product::with('color');

        // Tìm kiếm theo từ khóa
        if ($request->has('search') && $request->search) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }

        // Lọc theo tên màu (qua bảng colors)
        if ($request->has('color') && $request->color) {
            $query->whereHas('color', function ($q) use ($request) {
                $q->where('name', $request->color);
            });
        }

        // Lọc theo khoảng giá
        if ($request->has('min_price') && $request->min_price) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->has('max_price') && $request->max_price) {
            $query->where('price', '<=', $request->max_price);
        }

        // Lấy danh sách sản phẩm
        $products = $query->get();

        // Lấy danh sách tên màu (để hiển thị ở form lọc)
        $colors = Color::pluck('name');

        // Lấy danh sách giá
        $prices = Product::distinct()->pluck('price');

        return view('client.shop', compact('products', 'colors', 'prices'));
    }
}
