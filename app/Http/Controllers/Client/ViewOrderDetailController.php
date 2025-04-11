<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ViewOrderDetailController extends Controller
{
    public function show(Order $order, $id)
    {
        // Load chi tiết đơn hàng và sản phẩm
        $order = Order::with('details.product')->find($id); 
        return view('client.order_detail', compact('order'));
    }
}