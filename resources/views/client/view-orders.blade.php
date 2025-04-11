@extends('client.layouts.main')

@section('content')
    <!-- Breadcrumb section -->
    <div class="xc-breadcrumb__area base-bg">
        <div class="xc-breadcrumb__bg w-img xc-breadcrumb__overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="xc-breadcrumb__content p-relative z-index-1">
                        <div class="xc-breadcrumb__list">
                            <span><a href="/">Home</a></span>
                            <span class="dvdr"><i class="icon-arrow-right"></i></span>
                            <span>View Orders</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Orders section -->
    <section class="section-orders py-5">
        <div class="container">
            <h3>Đơn hàng của tôi</h3>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- Tabs for order status -->
            <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="tatca-tab" data-bs-toggle="tab" data-bs-target="#tatca" type="button" role="tab" aria-controls="tatca" aria-selected="true">Tất cả đơn hàng</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="dangxuly-tab" data-bs-toggle="tab" data-bs-target="#dangxuly" type="button" role="tab" aria-controls="dangxuly" aria-selected="false">Đang xử lý</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="daxacnhan-tab" data-bs-toggle="tab" data-bs-target="#daxacnhan" type="button" role="tab" aria-controls="daxacnhan" aria-selected="false">Đã xác nhận</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="danggiaohang-tab" data-bs-toggle="tab" data-bs-target="#danggiaohang" type="button" role="tab" aria-controls="danggiaohang" aria-selected="false">Đang giao hàng</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="thanhcong-tab" data-bs-toggle="tab" data-bs-target="#thanhcong" type="button" role="tab" aria-controls="thanhcong" aria-selected="false">Đã hoàn thành</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="dabihuy-tab" data-bs-toggle="tab" data-bs-target="#dabihuy" type="button" role="tab" aria-controls="dabihuy" aria-selected="false">Đã bị huỷ</button>
                </li>
            </ul>

            <!-- Tab content -->
            <div class="tab-content" id="myTabContent">
                <!-- Tất cả đơn hàng -->
                <div class="tab-pane fade show active" id="tatca" role="tabpanel" aria-labelledby="tatca-tab">
                    @forelse ($allOrders as $order)
                        @include('client.layouts.partials.order_card', ['order' => $order])
                    @empty
                        <p>Không có đơn hàng nào.</p>
                    @endforelse
                    {{ $allOrders->links() }}
                </div>

                <!-- Đang xử lý -->
                <div class="tab-pane fade" id="dangxuly" role="tabpanel" aria-labelledby="dangxuly-tab">
                    @forelse ($pendingOrders as $order)
                        @include('client.layouts.partials.order_card', ['order' => $order])
                    @empty
                        <p>Không có đơn hàng đang xử lý.</p>
                    @endforelse
                </div>

                <!-- Đã xác nhận -->
                <div class="tab-pane fade" id="daxacnhan" role="tabpanel" aria-labelledby="daxacnhan-tab">
                    @forelse ($processingOrders as $order)
                        @include('client.layouts.partials.order_card', ['order' => $order])
                    @empty
                        <p>Không có đơn hàng đã xác nhận.</p>
                    @endforelse
                </div>

                <!-- Đang giao hàng -->
                <div class="tab-pane fade" id="danggiaohang" role="tabpanel" aria-labelledby="danggiaohang-tab">
                    @forelse ($shippedOrders as $order)
                        @include('client.layouts.partials.order_card', ['order' => $order])
                    @empty
                        <p>Không có đơn hàng đang giao.</p>
                    @endforelse
                </div>

                <!-- Đã hoàn thành -->
                <div class="tab-pane fade" id="thanhcong" role="tabpanel" aria-labelledby="thanhcong-tab">
                    @forelse ($deliveredOrders as $order)
                        @include('client.layouts.partials.order_card', ['order' => $order])
                    @empty
                        <p>Không có đơn hàng đã hoàn thành.</p>
                    @endforelse
                </div>

                <!-- Đã bị huỷ -->
                <div class="tab-pane fade" id="dabihuy" role="tabpanel" aria-labelledby="dabihuy-tab">
                    @forelse ($canceledOrders as $order)
                        @include('client.layouts.partials.order_card', ['order' => $order])
                    @empty
                        <p>Không có đơn hàng đã bị hủy.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- Modal for cancelling order -->
    <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancelModalLabel">Lý do huỷ đơn hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="cancelOrderForm" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Lý do:</label>
                            <textarea class="form-control" id="message-text" name="message" placeholder="Nhập lý do huỷ đơn hàng"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Quay lại</button>
                            <button type="submit" name="submit_cancel" class="btn btn-primary">Gửi yêu cầu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for confirming order -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Xác nhận đơn hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Xác nhận đã nhận hàng thành công?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <a id="confirmOrderLink" href="#" class="btn btn-success">Xác nhận</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cancelButtons = document.querySelectorAll('.cancel-order-btn');
            const cancelForm = document.getElementById('cancelOrderForm');
            const confirmButtons = document.querySelectorAll('.confirm-order-btn');
            const confirmLink = document.getElementById('confirmOrderLink');

            // Xử lý nút hủy đơn hàng
            cancelButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const orderId = this.getAttribute('data-order-id');
                    cancelForm.action = `/cancel-order/${orderId}`;
                });
            });

            // Xử lý nút xác nhận đơn hàng
            confirmButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const orderId = this.getAttribute('data-order-id');
                    confirmLink.href = `/confirm-order-done/${orderId}`;
                });
            });
        });
    </script>
@endsection