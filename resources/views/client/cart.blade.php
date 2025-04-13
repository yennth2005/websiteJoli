@extends('client.layouts.main')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Thêm CDN cho Toastify.js -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

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
                                    <th><input type="checkbox" id="select-all" checked></th>
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
                                        <td><input type="checkbox" class="cart-item-checkbox" data-index="{{ $index }}" checked></td>
                                        <td>
                                            <img src="{{ $item['image'] ? asset('storage/' . $item['image']) : 'https://via.placeholder.com/100' }}"
                                                alt="{{ $item['name'] }}" width="50">
                                        </td>
                                        <td>{{ $item['name'] }}</td>
                                        <td>{{ number_format($item['price'], 0, ',', '.') }} $</td>
                                        <td>
                                            <div class="xc-product-quantity mt-10 mb-10">
                                                <span class="xc-cart-minus" data-index="{{ $index }}">
                                                    <i class="fas fa-minus"></i>
                                                </span>
                                                <input class="xc-cart-input" type="number" value="{{ $item['quantity'] }}"
                                                    min="1" max="{{ $item['stock'] }}" data-index="{{ $index }}" readonly>
                                                <span class="xc-cart-plus" data-index="{{ $index }}">
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                                <small class="text-muted">(Còn {{ $item['stock'] }} sản phẩm)</small>
                                            </div>
                                        </td>
                                        <td class="item-subtotal">{{ number_format($subtotal, 0, ',', '.') }} $</td>
                                        <td>
                                            <form action="{{ route('cart.remove', $index) }}" method="POST" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">X</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Giỏ hàng trống</td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <td colspan="6" class="text-end"><strong>Tổng tiền:</strong></td>
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
                                        <button type="button" class="cart-checkout-btn btn btn-success w-100 mt-3" onclick="proceedToCheckout()">
                                            Thanh toán
                                        </button>
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
            -moz-appearance: textfield;
        }
        .xc-cart-input::-webkit-inner-spin-button,
        .xc-cart-input::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        .xc-cart-plus.disabled,
        .xc-cart-minus.disabled {
            pointer-events: none;
            opacity: 0.5;
            cursor: not-allowed;
        }
        .xc-cart-plus,
        .xc-cart-minus {
            cursor: pointer;
            padding: 5px 10px;
            background: #f5f5f5;
            border: 1px solid #ddd;
        }
        .xc-cart-input.updated {
            animation: blink 0.3s;
        }
        @keyframes blink {
            0% { background-color: #fff; }
            50% { background-color: #e0e0e0; }
            100% { background-color: #fff; }
        }
        .text-muted {
            font-size: 12px;
            margin-left: 5px;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Hàm hiển thị toast
            function showToast(message, type = 'success') {
                Toastify({
                    text: message,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: "right",
                    backgroundColor: type === 'success' ? "#28a745" : "#dc3545",
                    stopOnFocus: true,
                }).showToast();
            }

            // Select all checkboxes
            const selectAll = document.getElementById('select-all');
            const checkboxes = document.querySelectorAll('.cart-item-checkbox');

            selectAll.addEventListener('change', function () {
                checkboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
                updateTotal();
            });

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateTotal);
            });

            // Update quantity
            document.getElementById('cart-container').addEventListener('click', function (e) {
                const button = e.target.closest('.xc-cart-plus, .xc-cart-minus');
                if (!button || button.classList.contains('disabled')) return;

                const index = button.dataset.index;
                const input = document.querySelector(`input[data-index="${index}"]`);
                let quantity = parseInt(input.value) || 1;

                if (button.classList.contains('xc-cart-plus')) {
                    quantity += 1;
                } else if (quantity > 1) {
                    quantity -= 1;
                } else {
                    return;
                }

                input.value = quantity;
                updateQuantity(index, quantity, input, button);
            });

            function updateQuantity(index, quantity, inputEl, button) {
                const originalValue = parseInt(inputEl.getAttribute('value')) || 1;
                const plusButton = document.querySelector(`.xc-cart-plus[data-index="${index}"]`);
                const minusButton = document.querySelector(`.xc-cart-minus[data-index="${index}"]`);

                plusButton.classList.add('disabled');
                minusButton.classList.add('disabled');

                fetch(`/cart/update/${index}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({ quantity })
                })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            inputEl.setAttribute('value', quantity);
                            inputEl.value = quantity;
                            inputEl.classList.add('updated');
                            const row = inputEl.closest('tr');
                            row.querySelector('.item-subtotal').textContent = new Intl.NumberFormat('vi-VN').format(data.subtotal) + ' $';
                            updateTotal();
                            showToast('Cập nhật số lượng thành công!', 'success');
                        } else {
                            inputEl.value = originalValue;
                            inputEl.setAttribute('value', originalValue);
                            showToast(data.message || 'Không thể cập nhật số lượng.', 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        inputEl.value = originalValue;
                        inputEl.setAttribute('value', originalValue);
                        showToast('Đã xảy ra lỗi khi cập nhật số lượng.', 'error');
                    })
                    .finally(() => {
                        plusButton.classList.remove('disabled');
                        minusButton.classList.remove('disabled');
                    });
            }

            function updateTotal() {
                let total = 0;
                document.querySelectorAll('.cart-item-checkbox:checked').forEach(checkbox => {
                    const row = checkbox.closest('tr');
                    const subtotalText = row.querySelector('.item-subtotal').textContent;
                    const subtotal = parseFloat(subtotalText.replace(/[^0-9]/g, '')) || 0;
                    total += subtotal;
                });
                document.querySelectorAll('.total-price').forEach(el => {
                    el.textContent = new Intl.NumberFormat('vi-VN').format(total) + ' $';
                });
            }

            window.proceedToCheckout = function () {
                const selectedItems = Array.from(document.querySelectorAll('.cart-item-checkbox:checked'))
                    .map(checkbox => checkbox.dataset.index);

                if (selectedItems.length === 0) {
                    showToast('Vui lòng chọn ít nhất một sản phẩm để thanh toán!', 'error');
                    return;
                }

                const url = '{{ route("checkout") }}' + '?selected_items=' + encodeURIComponent(JSON.stringify(selectedItems));
                window.location.href = url;
            };

            // Confirm delete
            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', function (e) {
                    if (!confirm('Bạn có muốn xóa sản phẩm này khỏi giỏ hàng không?')) {
                        e.preventDefault();
                    }
                });
            });

            // Hiển thị thông báo từ session nếu có
            @if (session('success'))
                showToast('{{ session('success') }}', 'success');
            @endif
            @if (session('error'))
                showToast('{{ session('error') }}', 'error');
            @endif
        });
    </script>
@endsection