@extends('admin.layouts.app')
@section('title', 'Sửa danh mục')
@section('eyebrow', 'Content / Categories / Edit')
@section('content')
    <div class="list-header">
        <div>
            <p class="eyebrow">Danh mục chụp hình</p>
            <h1>Sửa danh mục</h1>
            <p>Cập nhật thông tin cho danh mục {{ $category->name }}.</p>
        </div>
    </div>
    <form class="form-panel" method="POST" action="{{ route('admin.categories.update', $category) }}" enctype="multipart/form-data">@csrf @method('PUT')
        <div class="form-grid">
            <div class="field field--full"><label for="name">Tên danh mục</label><input id="name" name="name"
                    value="{{ old('name', $category->name) }}" required autofocus></div>
            <div class="field field--full"><label for="description">Mô tả</label>
                <textarea id="description" name="description">{{ old('description', $category->description) }}</textarea>
            </div>
            <div class="field"><label for="price">Giá booking</label><input id="price" name="price" type="number"
                    min="0" step="0.01" value="{{ old('price', $category->price) }}"
                    placeholder="Để trống nếu báo giá riêng"></div>
            <div class="field"><label for="image">Ảnh danh mục</label><input id="image" name="image" type="file"
                    accept="image/jpeg,image/png,image/webp">
                @if ($category->image)<small>Đã có ảnh. Chọn file mới để thay thế.</small><label><input type="checkbox" name="remove_image" value="1"> Xóa ảnh hiện tại</label>@endif
            </div>
            <div class="field field--full"><label for="features">Content list</label>
                <textarea id="features" name="features" placeholder="Mỗi dòng một nội dung">{{ old('features', implode(PHP_EOL, $category->features ?: [])) }}</textarea>
            </div>
        </div>@php($cancelUrl = route('admin.categories.index'))@php($submitLabel = 'Lưu thay đổi')@include('admin.partials.form-actions')</form>
@endsection
