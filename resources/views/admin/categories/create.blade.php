@extends('admin.layouts.app')
@section('title', 'Thêm danh mục')
@section('eyebrow', 'Content / Categories / New')
@section('content')
    <div class="list-header">
        <div>
            <p class="eyebrow">Danh mục chụp hình</p>
            <h1>Thêm danh mục</h1>
            <p>Tạo một nhóm mới cho các dự án đã chụp.</p>
        </div>
    </div>
    <form class="form-panel" method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">@csrf<div class="form-grid">
            <div class="field field--full"><label for="name">Tên danh mục</label><input id="name" name="name"
                    value="{{ old('name') }}" required autofocus></div>
            <div class="field field--full"><label for="description">Mô tả</label>
                <textarea id="description" name="description">{{ old('description') }}</textarea>
            </div>
            <div class="field"><label for="price">Giá booking</label><input id="price" name="price" type="number"
                    min="0" step="0.01" value="{{ old('price') }}" placeholder="Để trống nếu báo giá riêng">
            </div>
                <div class="field"><label for="image">Ảnh danh mục</label><input id="image" name="image" type="file"
                    accept="image/jpeg,image/png,image/webp"></div>
                <div class="field field--full"><label for="features">Content list</label>
                <textarea id="features" name="features" placeholder="Mỗi dòng một nội dung, ví dụ:&#10;- Event coverage&#10;- Candid & key moments">{{ old('features') }}</textarea>
                </div>
        </div>@php($cancelUrl = route('admin.categories.index'))@php($submitLabel = 'Tạo danh mục')@include('admin.partials.form-actions')</form>
@endsection
