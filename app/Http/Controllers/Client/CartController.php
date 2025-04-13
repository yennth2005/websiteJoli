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
        foreach ($cart as $index => &$item) {
            $product = Product::find($item['product_id']);
            if ($product) {
                $item['price'] = $product->price;
                $item['stock'] = $product->stock;
            } else {
                unset($cart[$index]);
            }
        }
        session()->put('cart', array_values($cart));
        return view('client.cart', compact('cart'));
    }

    public function add(Request $request)
    {
        $id = $request->input('product_id');
        $quantity = max(1, (int)$request->input('quantity', 1));
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

        foreach ($cart as $index => &$item) {
            if ($item['product_id'] == $id) {
                $newQuantity = $item['quantity'] + $quantity;
                if ($newQuantity > $product->stock) {
                    return redirect()->back()->with('error', "Chỉ còn {$product->stock} sản phẩm trong kho!");
                }
                $item['quantity'] = $newQuantity;
                $item['price'] = $product->price;
                $item['stock'] = $product->stock;
                $productExists = true;
                break;
            }
        }

        if (!$productExists) {
            $cart[] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'stock' => $product->stock,
                'image' => $product->image ?? null,
            ];
        }

        session()->put('cart', $cart);

        $message = 'Đã thêm sản phẩm vào giỏ hàng!';
        return $action === 'order'
            ? redirect()->route('cart')->with('success', $message)
            : redirect()->back()->with('success', $message);
    }

    public function remove($index)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$index])) {
            unset($cart[$index]);
            session()->put('cart', array_values($cart));
            return redirect()->back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
        }
        return redirect()->back()->with('error', 'Sản phẩm không tồn tại trong giỏ hàng!');
    }

    public function update(Request $request, $index)
    {
        $cart = session()->get('cart', []);
        if (!isset($cart[$index])) {
            return response()->json([
                'success' => false,
                'message' => 'Sản phẩm không tồn tại trong giỏ hàng.'
            ], 404);
        }

        $product = Product::find($cart[$index]['product_id']);
        if (!$product) {
            unset($cart[$index]);
            session()->put('cart', array_values($cart));
            return response()->json([
                'success' => false,
                'message' => 'Sản phẩm không còn tồn tại.'
            ], 404);
        }

        $newQuantity = max(1, (int)$request->input('quantity', 1));
        if ($newQuantity > $product->stock) {
            return response()->json([
                'success' => false,
                'message' => "Chỉ còn {$product->stock} sản phẩm trong kho!"
            ], 400);
        }

        $cart[$index]['quantity'] = $newQuantity;
        $cart[$index]['price'] = $product->price;
        $cart[$index]['stock'] = $product->stock;
        session()->put('cart', $cart);

        $subtotal = $newQuantity * $product->price;
        $total = collect($cart)->sum(function ($item) {
            return $item['quantity'] * $item['price'];
        });

        return response()->json([
            'success' => true,
            'subtotal' => $subtotal,
            'total' => $total,
        ]);
    }
}