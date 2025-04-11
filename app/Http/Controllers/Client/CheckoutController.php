<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để thanh toán!');
        }

        $selectedItems = json_decode($request->query('selected_items'), true);
        if (empty($selectedItems)) {
            return redirect()->route('cart')->with('error', 'Vui lòng chọn ít nhất một sản phẩm để thanh toán!');
        }

        $cart = session()->get('cart', []);
        $selectedCartItems = [];
        $totalPrice = 0;

        foreach ($selectedItems as $index) {
            if (isset($cart[$index])) {
                $item = $cart[$index];
                $product = Product::find($item['product_id']);
                if ($product && $item['quantity'] <= $product->stock) {
                    $item['price'] = $product->price;
                    $selectedCartItems[$index] = $item;
                    $totalPrice += $item['quantity'] * $product->price;
                }
            }
        }

        if (empty($selectedCartItems)) {
            return redirect()->route('cart')->with('error', 'Không có sản phẩm hợp lệ để thanh toán!');
        }

        $user = Auth::user();
        return view('client.checkout', compact('selectedCartItems', 'totalPrice', 'user'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để thanh toán!');
        }

        $selectedItems = json_decode($request->input('selected_items'), true);
        if (empty($selectedItems)) {
            return redirect()->route('cart')->with('error', 'Vui lòng chọn ít nhất một sản phẩm để thanh toán!');
        }

        $cart = session()->get('cart', []);
        $selectedCartItems = [];
        $totalPrice = 0;

        foreach ($selectedItems as $index) {
            if (!isset($cart[$index])) {
                continue;
            }
            $item = $cart[$index];
            $product = Product::find($item['product_id']);
            if (!$product || $item['quantity'] > $product->stock) {
                return redirect()->route('cart')->with('error', "Sản phẩm {$item['name']} không đủ hàng hoặc không tồn tại!");
            }
            $item['price'] = $product->price;
            $selectedCartItems[$index] = $item;
            $totalPrice += $item['quantity'] * $product->price;
        }

        if (empty($selectedCartItems)) {
            return redirect()->route('cart')->with('error', 'Không có sản phẩm hợp lệ để thanh toán!');
        }

        $request->validate([
            'shipping_name' => 'required|string|max:255',
            'shipping_address' => 'required|string|max:255',
            'shipping_phone' => 'required|string|max:20',
        ]);

        $user = Auth::user();

        try {
            $order = Order::create([
                'user_id' => $user->id,
                'total_price' => $totalPrice,
                'status' => 'pending',
                'shipping_name' => $request->shipping_name,
                'shipping_address' => $request->shipping_address,
                'shipping_phone' => $request->shipping_phone,
            ]);

            foreach ($selectedCartItems as $index => $item) {
                $product = Product::find($item['product_id']);
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $product->price,
                ]);

                $product->stock -= $item['quantity'];
                $product->save();

                unset($cart[$index]);
            }

            session()->put('cart', array_values($cart));

            return redirect()->route('view-order-detail', $order->id)->with('success', 'Đặt hàng thành công!');
        } catch (\Exception $e) {
            return redirect()->route('cart')->with('error', 'Đã có lỗi xảy ra: ' . $e->getMessage());
        }
    }
}