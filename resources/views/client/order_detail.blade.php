@extends('client.layouts.main')

@section('content')
    <!-- Checkout section -->
    <section class="section-cart py-5">
        <div class="container">
            <h1 class="mb-4">Chi tiết đơn hàng #{{ $order->id }}</h1>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <div class="row">
                <!-- Thông tin người nhận -->
                <div class="col-lg-6 col-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Thông tin người nhận</h4>
                            <p><strong>Khách hàng:</strong> {{ $order->shipping_name }}</p>
                            <p><strong>Số điện thoại:</strong> {{ $order->shipping_phone }}</p>
                            <p><strong>Địa chỉ:</strong> {{ $order->shipping_address }}</p>
                            <p><strong>Lời nhắn:</strong> Chưa hỗ trợ</p> <!-- Nếu có cột note thì thay vào -->
                        </div>
                    </div>
                </div>

                <!-- Lịch sử trạng thái đơn hàng -->
                <div class="col-lg-6 col-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Lịch sử trạng thái</h4>
                            <div class="timeline">
                                <div class="timeline-event row mb-3">
                                    <div class="col-md-4 timeline-date text-muted">{{ $order->created_at->format('d/m/Y H:i') }}</div>
                                    <div class="col-md-8 timeline-content">
                                        <strong>Đang xử lý</strong><br>
                                        Đơn hàng đã được đặt thành công.
                                    </div>
                                </div>
                                @if (in_array($order->status, ['processing', 'shipped', 'delivered', 'canceled']))
                                    <div class="timeline-event row mb-3">
                                        <div class="col-md-4 timeline-date text-muted">{{ $order->updated_at->format('d/m/Y H:i') }}</div>
                                        <div class="col-md-8 timeline-content">
                                            <strong>{{ ucfirst(str_replace(['processing', 'shipped', 'delivered', 'canceled'], ['Đã xác nhận', 'Đang giao hàng', 'Đã hoàn thành', 'Đã bị hủy'], $order->status)) }}</strong><br>
                                            {{ $order->status == 'processing' ? 'Đơn hàng đã được xác nhận bởi cửa hàng.' : ($order->status == 'shipped' ? 'Đơn hàng đang được giao.' : ($order->status == 'delivered' ? 'Đơn hàng đã giao thành công.' : 'Đơn hàng đã bị hủy.')) }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Danh sách sản phẩm -->
                <div class="col-lg-6 col-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Sản phẩm trong đơn hàng</h4>
                            @foreach ($order->details as $detail)
                                
                                <div class="row align-items-center mb-3">
                                    <div class="col-md-2 col-4">
                                        <img src="{{ $detail->product->image ? asset('storage/' . $detail->product->image) : 'https://via.placeholder.com/100' }}"
                                            class="img-fluid rounded" alt="Product Image" loading="lazy">
                                    </div>
                                    <div class="col-md-7 col-8">
                                        <h5 class="card-title mb-1">
                                            <a href="/view-detail/{{ $detail->product_id }}">{{ $detail->product->name }}</a>
                                        </h5>
                                        <p class="mb-1">Màu: Chưa hỗ trợ - Size: Chưa hỗ trợ</p> <!-- Thêm cột nếu cần -->
                                        <p class="mb-1">Giá: <span class="text-danger fw-bold">{{ number_format($detail->price, 0, ',', '.') }}đ</span></p>
                                        <p class="mb-0">Số lượng: <span class="text-info fw-bold">x {{ $detail->quantity }}</span></p>
                                    </div>
                                    <div class="col-md-3 text-md-end text-start mt-3 mt-md-0">
                                        <p class="mb-0">Tổng tiền: <span class="text-success fw-bold">{{ number_format($detail->price * $detail->quantity, 0, ',', '.') }}đ</span></p>
                                        @if ($order->status == 'delivered' && !$comment)
                                            <button type="button" class="btn btn-success btn-sm mt-2 comment-btn" data-item-id="{{ $detail->id }}"
                                                data-product-id="{{ $detail->product_id }}" data-order-id="{{ $order->id }}" data-bs-toggle="modal"
                                                data-bs-target="#commentModal">Đánh giá</button>
                                        @elseif ($order->status == 'delivered' && $comment)
                                            <button type="button" class="btn btn-success btn-sm mt-2 view-comment-btn"
                                                data-item-id="{{ $detail->id }}" data-product-id="{{ $detail->product_id }}" data-order-id="{{ $order->id }}"
                                                data-comment-id="{{ $comment->id }}" data-title="{{ $comment->title }}" data-content="{{ $comment->content }}"
                                                data-bs-toggle="modal" data-bs-target="#viewCommentModal">Xem đánh giá</button>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Tổng kết đơn hàng -->
                <div class="col-lg-6 col-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Tổng kết đơn hàng</h4>
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Tổng tiền hàng</td>
                                        <td class="text-end">{{ number_format($order->total_price, 0, ',', '.') }}đ</td>
                                    </tr>
                                    <tr>
                                        <td>Phí vận chuyển</td>
                                        <td class="text-end">+0đ</td> <!-- Thêm cột shipping_fee nếu cần -->
                                    </tr>
                                    <tr>
                                        <td>Giảm giá phí vận chuyển</td>
                                        <td class="text-end text-danger">-0đ</td>
                                    </tr>
                                    <tr class="fw-bold">
                                        <td>Thành tiền</td>
                                        <td class="text-end text-success">{{ number_format($order->total_price, 0, ',', '.') }}đ</td>
                                    </tr>
                                    <tr>
                                        <td>Phương thức thanh toán</td>
                                        <td class="text-end">Thanh toán khi nhận hàng</td> <!-- Thêm cột payment_method nếu cần -->
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
