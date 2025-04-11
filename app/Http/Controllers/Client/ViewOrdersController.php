<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewOrdersController extends Controller
{
    public function index()
    {
        // Lấy tất cả đơn hàng của người dùng hiện tại
        $orders = Order::where('user_id', Auth::id())
                       ->with('details.product') // Load chi tiết đơn hàng và sản phẩm
                       ->orderBy('created_at', 'desc')
                       ->paginate(10); // Phân trang, 10 đơn hàng mỗi trang

        // Nhóm đơn hàng theo trạng thái để dễ xử lý trong view
        $allOrders = $orders; // Tất cả đơn hàng
        $pendingOrders = Order::where('user_id', Auth::id())->where('status', 'pending')->get();
        $processingOrders = Order::where('user_id', Auth::id())->where('status', 'processing')->get();
        $shippedOrders = Order::where('user_id', Auth::id())->where('status', 'shipped')->get();
        $deliveredOrders = Order::where('user_id', Auth::id())->where('status', 'delivered')->get();
        $canceledOrders = Order::where('user_id', Auth::id())->where('status', 'canceled')->get();

        return view('client.view-orders', compact(
            'allOrders',
            'pendingOrders',
            'processingOrders',
            'shippedOrders',
            'deliveredOrders',
            'canceledOrders',
            'orders' // Dùng cho phân trang
        ));
    }

    public function cancel(Request $request, $orderId)
    {
        $order = Order::where('user_id', Auth::id())->findOrFail($orderId);

        // Chỉ cho phép hủy nếu đơn hàng ở trạng thái 'pending' hoặc 'processing'
        if (!in_array($order->status, ['pending', 'processing'])) {
            return redirect()->back()->with('error', 'Không thể hủy đơn hàng ở trạng thái này!');
        }

        $order->update([
            'status' => 'canceled',
            'cancel_reason' => $request->input('message'),
        ]);

        return redirect()->route('view-orders')->with('success', 'Đơn hàng đã được hủy thành công!');
    }

    public function confirm($orderId)
    {
        $order = Order::where('user_id', Auth::id())->findOrFail($orderId);

        // Chỉ cho phép xác nhận nếu đơn hàng ở trạng thái 'shipped'
        if ($order->status !== 'shipped') {
            return redirect()->back()->with('error', 'Không thể xác nhận đơn hàng ở trạng thái này!');
        }

        $order->update(['status' => 'delivered']);

        return redirect()->route('view-orders')->with('success', 'Đơn hàng đã được xác nhận thành công!');
    }
}