<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function index()
    {
        
            $products = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->leftJoin('product_variants', 'products.id', '=', 'product_variants.product_id')
                ->leftJoin('colors', 'product_variants.color_id', '=', 'colors.id')
                ->select(
                    'products.id as product_id',
                    'products.name as product_name',
                    'products.description',
                    'products.status',
                    'products.image',
                    'categories.name as category_name',
                    'product_variants.id as variant_id',
                    'colors.name as color_name',
                    'colors.hex_code',
                    DB::raw('COALESCE(product_variants.price, 0) as price'),
                    DB::raw('COALESCE(product_variants.sale_price, 0) as sale_price'),
                    DB::raw('COALESCE(product_variants.stock, 0) as stock')
                )
                ->orderBy('products.id', 'asc')
                ->get();
        
            return view('admin.products.list', compact('products'));
       
        
    }
    public function create()
    {
        $categories = Category::all();
        $colors = Color::all(); // Lấy tất cả màu sắc
    return view('admin.products.create', compact('categories', 'colors'));
      
    }

    // Xử lý thêm mới sản phẩm
    public function store(Request $request)
    {
        // dd($request->all()); // Debug dữ liệu form gửi lên
    
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:active,deleted',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'color_id' => 'required|exists:colors,id',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);
    
        DB::beginTransaction();
        try {
            // Lưu sản phẩm vào bảng `products`
            $productData = $request->only(['name', 'description', 'category_id', 'status']);
    
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('products', 'public');
                $productData['image'] = $imagePath;
            }
    
            $product = Product::create($productData);
    
            // Lưu biến thể sản phẩm vào bảng `product_variants`
            ProductVariant::create([
                'product_id' => $product->id,
                'color_id' => $request->color_id,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'stock' => $request->stock,
            ]);
    
            DB::commit();
            return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được thêm!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Lỗi khi thêm sản phẩm: ' . $e->getMessage()]);
        }
    }
    

    
   
    
    

    // Hiển thị form chỉnh sửa sản phẩm
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $colors = Color::all(); // Lấy tất cả màu sắc
        return view('admin.products.edit', compact('product', 'categories','colors'));
    }

    // Xử lý cập nhật sản phẩm
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
    
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'color_id' => 'required|exists:colors,id',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Cập nhật sản phẩm
        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'image' => $request->hasFile('image') ? $request->file('image')->store('products', 'public') : $product->image,
        ]);
    
        // Cập nhật biến thể sản phẩm
        $product->variants()->updateOrCreate(
            ['product_id' => $product->id],
            [
                'color_id' => $request->color_id,
                'price' => $request->price,
                'sale_price' => $request->sale_price ?? 0,
                'stock' => $request->stock,
            ]
        );
    
        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã được cập nhật!');
    }
    
    
    

    // Xóa sản phẩm
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('admin.products.index')->with('success', 'Sản phẩm đã bị xóa!');
    }

    
}
