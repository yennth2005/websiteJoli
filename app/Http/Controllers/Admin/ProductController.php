<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color; // Thêm use cho model Color
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with('category', 'color')->latest()->paginate(10); // Eager load color
        return view('admin.products.list', compact('products'));
    }


    public function create()
    {
        $categories = Category::all();
        $colors = Color::all(); // Lấy danh sách màu sắc
        return view('admin.products.create', compact('categories', 'colors'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'color_id' => 'nullable|integer|exists:colors,id', // Validation cho color_id
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'sale_price' => [
                'nullable',
                'numeric',
                'min:0',
                function ($attribute, $value, $fail) use ($request) {
                    $price = $request->input('price');

                    if ($value !== null && $price !== null && $value >= $price) {
                        $fail('Giá sale phải nhỏ hơn giá gốc.');
                    }

                    if ($value !== null && $price !== null && $price > 0) {
                        $discountPercentage = (($price - $value) / $price) * 100;
                        if ($discountPercentage > 10) {
                            $fail('Mức giảm giá không được vượt quá 10%. Hiện tại là ' . round($discountPercentage, 2) . '%.');
                        }
                    }
                },
            ],
            'stock' => 'required|integer|min:0',
            'status' => 'nullable|in:active,deleted',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $productData = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $productData['image'] = $imagePath;
        }

        Product::create($productData);

        return redirect()->route('admin.products.index')->with('success', 'Thêm sản phẩm thành công!');
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $colors = Color::all(); // Lấy danh sách màu sắc
        return view('admin.products.edit', compact('product', 'categories', 'colors'));
    }


    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'category_id' => 'sometimes|required|exists:categories,id',
            'name' => 'sometimes|required|string|max:255',
            'color_id' => 'nullable|integer|exists:colors,id', // Validation cho color_id
            'image' => 'nullable|file',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|numeric|min:0',
            'sale_price' => [
                'nullable',
                'numeric',
                'min:0',
                function ($attribute, $value, $fail) use ($request) {
                    $price = $request->input('price');

                    if ($value !== null && $price !== null && $value >= $price) {
                        $fail('Giá sale phải nhỏ hơn giá gốc.');
                    }

                    if ($value !== null && $price !== null && $price > 0) {
                        $discountPercentage = (($price - $value) / $price) * 100;
                        if ($discountPercentage > 10) {
                            $fail('Mức giảm giá không được vượt quá 10%. Hiện tại là ' . round($discountPercentage, 2) . '%.');
                        }
                    }
                },
            ],
            'stock' => 'sometimes|required|integer|min:0',
            'status' => 'nullable|in:active,deleted',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $productData = $request->all();

        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('products', 'public');
            $productData['image'] = $imagePath;
        }

        $product->update($productData);

        return redirect()->route('admin.products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Xóa sản phẩm thành công!');
    }

    public function trashed()
    {
        $trashedProducts = Product::onlyTrashed()->with('category', 'color')->latest()->paginate(10); // Eager load color
        return view('admin.products.trashed', compact('trashedProducts'));
    }

    public function restore($id)
    {
        $product = Product::withTrashed()->findOrFail($id);
        $product->restore();

        return redirect()->route('admin.products.trashed')->with('success', 'Khôi phục sản phẩm thành công!');
    }


    public function forceDelete($id)
    {
        $product = Product::withTrashed()->findOrFail($id);

        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->forceDelete();

        return redirect()->route('admin.products.trashed')->with('success', 'Xóa vĩnh viễn sản phẩm thành công!');
    }
}