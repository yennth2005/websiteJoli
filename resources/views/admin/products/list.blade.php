@extends('admin.layouts.main')

@section('content')
<div class="container">
    <h1 class="mb-4">Quản lý sản phẩm</h1>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3">Thêm mới</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Hình ảnh</th>
                <th>Sản phẩm</th>
                <th>Danh mục</th>
                <th>Màu</th>
                <th>Giá</th>
                <th>Giá Sale</th>
                <th>Tồn kho</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->product_id }}</td>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" width="100">
                        @else
                            Không có ảnh
                        @endif
                    </td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->category_name }}</td>
                    <td>
                        @if ($product->color_name)
                            <span style="background-color: {{ $product->hex_code }}; padding: 5px 10px; border-radius: 5px;">
                                {{ $product->color_name }}
                            </span>
                        @else
                            Không có
                        @endif
                    </td>
                    <td>{{ number_format($product->price, 0, ',', '.') }}đ</td>
                    <td>{{ $product->sale_price ? number_format($product->sale_price, 0, ',', '.') . 'đ' : 'Không có' }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('admin.products.edit', $product->product_id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('admin.products.destroy', $product->product_id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    
</div>
@endsection
