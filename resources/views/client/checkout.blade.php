@extends('client.layouts.main')

@section('content')
    <div class="container pt-80 pb-80">
        <h2>Xác nhận đơn hàng</h2>
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="row">
            <div class="col-md-8">
                <h4>Thông tin sản phẩm</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Tổng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($selectedCartItems as $index => $item)
                            @php
                                $product = App\Models\Product::find($item['product_id']);
                                $price = $product ? $product->price : $item['price'];
                                $subtotal = $price * $item['quantity'];
                            @endphp
                            <tr>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ number_format($price, 0, ',', '.') }} đ</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>{{ number_format($subtotal, 0, ',', '.') }} đ</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-end"><strong>Tổng tiền:</strong></td>
                            <td><strong>{{ number_format($totalPrice, 0, ',', '.') }} đ</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-md-4">
                <h4>Thông tin giao hàng</h4>
                <form action="{{ route('checkout.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="selected_items" value="{{ json_encode(array_keys($selectedCartItems)) }}">
                    <div class="mb-3">
                        <label for="shipping_name" class="form-label">Tên người nhận</label>
                        <input type="text" class="form-control @error('shipping_name') is-invalid @enderror" 
                               id="shipping_name" name="shipping_name" 
                               value="{{ old('shipping_name', $user->name) }}" required>
                        @error('shipping_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="shipping_address" class="form-label">Địa chỉ giao hàng</label>
                        <input type="text" class="form-control @error('shipping_address') is-invalid @enderror" 
                               id="shipping_address" name="shipping_address" 
                               value="{{ old('shipping_address', $user->address) }}" required>
                        @error('shipping_address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="shipping_phone" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control @error('shipping_phone') is-invalid @enderror" 
                               id="shipping_phone" name="shipping_phone" 
                               value="{{ old('shipping_phone', $user->phone) }}" required>
                        @error('shipping_phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success w-100">Xác nhận đặt hàng</button>
                </form>
                <a href="{{ route('profile.edit') }}" class="btn btn-secondary w-100 mt-2">Cập nhật hồ sơ</a>
            </div>
        </div>
    </div>
@endsection