@extends('client.layouts.main')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="xc-breadcrumb__area base-bg">
        <div class="xc-breadcrumb__bg w-img xc-breadcrumb__overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="xc-breadcrumb__content p-relative z-index-1">
                        <div class="xc-breadcrumb__list">
                            <span><a href="/">Home</a></span>
                            <span class="dvdr"><i class="icon-arrow-right"></i></span>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="xc-cart-page pt-80 pb-80">
        <div class="container" id="cart-container">
            <div class="row gutter-y-30 gx-5">
                <div class="col-lg-8 col-xl-9">
                    <div class="xc-cart-page__table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp
                                @forelse ($cart as $index => $item)
                                    @php
                                        $subtotal = $item['price'] * $item['quantity'];
                                        $total += $subtotal;
                                    @endphp
                                    <tr>
                                        <td>{{ $item['name'] }}</td>
                                        <td>{{ number_format($item['price'], 0, ',', '.') }} $</td>
                                        <td>
                                            <div class="xc-product-quantity mt-10 mb-10">
                                                <span class="xc-cart-minus" data-index="{{ $index }}">
                                                    <i class="fas fa-minus"></i>
                                                </span>
                                                <input class="xc-cart-input" type="number" value="{{ $item['quantity'] }}"
                                                    min="1" data-index="{{ $index }}">
                                                <span class="xc-cart-plus" data-index="{{ $index }}">
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="item-subtotal">{{ number_format($subtotal, 0, ',', '.') }} $</td>
                                        <td>
                                            <form action="{{ route('cart.remove', $index) }}" method="POST"
                                                class="delete-form">
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">X</button>
                                            </form>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Giỏ hàng trống</td>
                                    </tr>
                                @endforelse

                                <tr>
                                    <td colspan="5" class="text-end"><strong>Tổng tiền:</strong></td>
                                    <td><strong class="total-price">{{ number_format($total, 0, ',', '.') }} $</strong></td>
                                </tr>

                            </tbody>

                        </table>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="shop_cart_widget xc-accordion">
                        <div class="accordion" id="shop_size">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="size__widget">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#size_widget_collapse" aria-expanded="true"
                                        aria-controls="size_widget_collapse">
                                        Tóm tắt đơn hàng
                                    </button>
                                </h2>
                                <div id="size_widget_collapse" class="accordion-collapse collapse show"
                                    aria-labelledby="size__widget" data-bs-parent="#shop_size">
                                    <div class="accordion-body">
                                        <div class="cart-subtitle d-flex justify-content-between">
                                            <h4>Tổng tiền:</h4>
                                            <h4 class="total-price">{{ number_format($total, 0, ',', '.') }} $</h4>
                                        </div>
                                        <a class="cart-checkout-btn btn btn-success w-100 mt-3"
                                            href="{{ route('checkout') }}">Thanh toán</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .xc-cart-input {
            text-align: center;
            vertical-align: middle;
            padding: 5px 10px;
            height: 40px;
            width: 60px;
            font-size: 16px;
            border: none;
            background: white;

            /* Ẩn mũi tên */
            -moz-appearance: textfield;
        }

        .xc-cart-input::-webkit-inner-spin-button,
        .xc-cart-input::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            document.getElementById('cart-container').addEventListener('click', function(e) {
                const button = e.target.closest('.xc-cart-plus, .xc-cart-minus');
                if (!button) return;

                const index = button.dataset.index;
                const input = document.querySelector(`input[data-index="${index}"]`);
                let quantity = parseInt(input.value);
                quantity = button.classList.contains('xc-cart-plus') ? quantity + 1 : quantity - 1;
                if (quantity < 1) quantity = 1;

                input.value = quantity;
                updateQuantity(index, quantity, input);
            });

            function updateQuantity(index, quantity, inputEl) {
                fetch(`/cart/update/${index}`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": csrfToken
                        },
                        body: JSON.stringify({
                            quantity
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            const row = inputEl.closest('tr');
                            row.querySelector('.item-subtotal').innerText = data.subtotal + ' $';
                            document.querySelectorAll('.total-price').forEach(el => {
                                el.innerText = data.total + ' $';
                            });

                            inputEl.setAttribute('value', quantity);
                        } else {
                            alert(data.message);
                            inputEl.value = inputEl.getAttribute('value');
                        }
                    });
            }
        });
        // Xác nhận trước khi xóa sản phẩm
        document.querySelectorAll('.delete-form').forEach(form => {
            form.addEventListener('submit', function(e) {
                const confirmed = confirm('Bạn có muốn xoá sản phẩm này khỏi giỏ hàng không?');
                if (!confirmed) {
                    e.preventDefault(); // huỷ nếu không đồng ý
                }
            });
        });
    </script>
@endsection
