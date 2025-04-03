@extends('admin.layouts.main')

@section('content')
<div class="container">
    <h2>Edit Product</h2>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
        <div class="form-group">
            <label for="name">Tên sản phẩm</label>
            <input type="text" class="form-control" name="name" value="{{ $product->name }}" required>
        </div>
    
        <div class="form-group">
            <label for="category_id">Danh mục</label>
            <select class="form-control" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label for="color_id">Màu sắc</label>
            <select class="form-control" name="color_id" required>
                @foreach($colors as $color)
                    <option value="{{ $color->id }}" {{ $color->id == optional($product->variants->first())->color_id ? 'selected' : '' }}>{{ $color->name }}</option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label for="price">Giá</label>
            <input type="number" class="form-control" name="price" value="{{ optional($product->variants->first())->price }}" required>
        </div>
    
        <div class="form-group">
            <label for="sale_price">Giá Sale</label>
            <input type="number" class="form-control" name="sale_price" value="{{ optional($product->variants->first())->sale_price }}">
        </div>
    
        <div class="form-group">
            <label for="stock">Tồn kho</label>
            <input type="number" class="form-control" name="stock" value="{{ optional($product->variants->first())->stock }}" required>
        </div>
    
        <div class="form-group">
            <label for="image">Hình ảnh</label>
            <input type="file" class="form-control" name="image">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" width="100">
            @endif
        </div>
    
        <button type="submit" class="btn btn-success">Cập nhật sản phẩm</button>
    </form>
    
</div>
@endsection