<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        // Lấy giá mới nhất từ Product
        foreach ($cart as &$item) {
            $product = Product::find($item['product_id']);
            if ($product) {
                $item['price'] = $product->price; // Cập nhật giá
                $item['stock'] = $product->stock; // Cập nhật tồn kho
            } else {
                unset($cart[array_search($item, $cart)]); // Xóa nếu sản phẩm không tồn tại
            }
        }
        session()->put('cart', array_values($cart)); // Reset key
        return view('client.cart', compact('cart'));
    }

    public function add(Request $request)
    {
        $id = $request->input('product_id');
        $quantity = (int)$request->input('quantity', 1);
        $action = $request->input('action');

        $product = Product::find($id);
        if (!$product) {
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại!');
        }

        if ($quantity > $product->stock) {
            return redirect()->back()->with('error', "Chỉ còn {$product->stock} sản phẩm trong kho!");
        }

        $cart = session()->get('cart', []);
        $productExists = false;

        foreach ($cart as $index => $item) {
            if ($item['product_id'] == $id) {
                $newQuantity = $cart[$index]['quantity'] + $quantity;
                if ($newQuantity > $product->stock) {
                    return redirect()->back()->with('error', "Chỉ còn {$product->stock} sản phẩm trong kho!");
                }
                $cart[$index]['quantity'] = $newQuantity;
                $cart[$index]['stock'] = $product->stock; // Cập nhật tồn kho
                $productExists = true;
                break;
            }
        }

        if (!$productExists) {
            $cart[] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price, // Lấy giá từ Product
                'quantity' => $quantity,
                'stock' => $product->stock,
                'image' => $product->image ?? null,
            ];
        }

        session()->put('cart', $cart);

        if ($action === 'order') {
            return redirect()->route('cart')->with('success', 'Đã thêm sản phẩm vào giỏ hàng!');
        } else {
            return redirect()->back()->with('success', 'Đã thêm sản phẩm vào giỏ hàng!');
        }
    }

    public function remove($index)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$index])) {
            unset($cart[$index]);
            session()->put('cart', array_values($cart));
        }
        return redirect()->back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
    }

    public function update(Request $request, $index)
    {
        $cart = session()->get('cart', []);
        if (!isset($cart[$index])) {
            return response()->json(['success' => false, 'message' => 'Sản phẩm không có trong giỏ hàng']);
        }

        $product = Product::find($cart[$index]['product_id']);
        if (!$product) {
            unset($cart[$index]);
            session()->put('cart', array_values($cart));
            return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại']);
        }

        $newQuantity = (int)$request->quantity;
        if ($newQuantity > $product->stock) {
            return response()->json([
                'success' => false,
                'message' => "Chỉ còn {$product->stock} sản phẩm trong kho!"
            ]);
        }

        $cart[$index]['quantity'] = $newQuantity;
        $cart[$index]['price'] = $product->price; // Cập nhật giá từ Product
        $cart[$index]['stock'] = $product->stock;
        session()->put('cart', $cart);

        $subtotal = $newQuantity * $product->price; // Tính subtotal từ giá mới
        $total = collect($cart)->sum(function ($item) use ($cart) {
            $product = Product::find($item['product_id']);
            return $product ? $item['quantity'] * $product->price : 0;
        });

        return response()->json([
            'success' => true,
            'subtotal' => number_format($subtotal, 0, ',', '.'),
            'total' => number_format($total, 0, ',', '.'),
        ]);
    }
}