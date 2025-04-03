@extends('admin.layouts.main')

@section('content')
<div class="container">
    <h1 class="mb-4">Thêm mới sản phẩm</h1>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="category_id">Danh mục</label>
            <select class="form-control" id="category_id" name="category_id" required>
                <option value="">Chọn danh mục</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select class="form-control" id="status" name="status" required>
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Kích hoạt</option>
                <option value="deleted" {{ old('status') == 'deleted' ? 'selected' : '' }}>Đã xóa</option>
            </select>
        </div>

        <div class="form-group">
            <label for="image">Hình ảnh</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="form-group">
            <label for="price">Giá</label>
            <input type="number" class="form-control" name="price" >
        </div>
        <div class="form-group">
            <label for="sale_price">Giá Sale</label>
            <input type="number" class="form-control" id="sale_price" name="sale_price" value="{{ old('sale_price') }}">
        </div>
       
        <div class="form-group">
            <label for="stock">Tồn kho</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock') }}">
        </div>
        <div class="form-group">
            <label for="color_id">Màu sắc</label>
            <select class="form-control" name="color_id" required>
                <option value="" disabled selected>Chọn màu sắc</option>
                @foreach($colors as $color)
                    <option value="{{ $color->id }}">{{ $color->name }}</option>
                @endforeach
            </select>
        </div>
        

        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
    </form>
</div>
@endsection
