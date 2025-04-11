<div class="card shadow-sm mb-3">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-md-2 col-4">
                <img src="{{ $order->details->first()->product->image ? asset('storage/' . $order->details->first()->product->image) : 'https://via.placeholder.com/100' }}"
                     class="img-fluid rounded" alt="Product Image" loading="lazy">
            </div>
            <div class="col-md-6 col-8">
                <h5 class="card-title mb-1">{{ $order->details->first()->product->name }}</h5>
                <p class="mb-1">Giá: <span class="text-danger fw-bold">{{ number_format($order->details->first()->price, 0, ',', '.') }}đ</span></p>
                <p class="mb-1">Thời gian đặt hàng: <span class="text-muted">{{ $order->created_at->format('d/m/Y') }}</span></p>
                <p class="mb-0">Tổng tiền: <span class="text-success fw-bold">{{ number_format($order->total_price, 0, ',', '.') }}đ</span></p>
            </div>
            <div class="col-md-4 text-md-end text-start mt-3 mt-md-0">
                <span class="badge {{ $order->status == 'pending' ? 'bg-primary' : ($order->status == 'processing' ? 'bg-info' : ($order->status == 'shipped' ? 'bg-warning' : ($order->status == 'delivered' ? 'bg-success' : 'bg-danger'))) }} mb-2">
                    {{ ucfirst(str_replace(['pending', 'processing', 'shipped', 'delivered', 'canceled'], ['Đang xử lý', 'Đã xác nhận', 'Đang giao hàng', 'Đã hoàn thành', 'Đã bị hủy'], $order->status)) }}
                </span>
                <div class="d-flex gap-2 justify-content-md-end">
                    <a href="{{ route('view-order-detail', $order->id) }}" class="btn btn-outline-primary btn-sm">Xem chi tiết</a>
                    @if (in_array($order->status, ['pending', 'processing']))
                        <button type="button" class="btn btn-outline-danger btn-sm cancel-order-btn" data-order-id="{{ $order->id }}" data-bs-toggle="modal" data-bs-target="#cancelModal">Huỷ đơn hàng</button>
                    @elseif ($order->status == 'shipped')
                        <button type="button" class="btn btn-success btn-sm confirm-order-btn" data-order-id="{{ $order->id }}" data-bs-toggle="modal" data-bs-target="#confirmModal">Xác nhận</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>