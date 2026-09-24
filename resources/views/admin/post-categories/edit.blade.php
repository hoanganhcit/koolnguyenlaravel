@extends('admin.layouts.app')
@section('title', 'Sửa danh mục bài viết')
@section('eyebrow', 'Editorial / Post Categories / Edit')
@section('content')
    <div class="list-header">
        <div>
            <p class="eyebrow">Danh mục bài viết</p>
            <h1>Sửa danh mục</h1>
            <p>Cập nhật thông tin cho danh mục {{ $category->name }}.</p>
        </div>
    </div>
    <form class="form-panel" method="POST" action="{{ route('admin.post-categories.update', $category) }}">@csrf @method('PUT')<div class="form-grid">
            <div class="field field--full"><label for="name">Tên danh mục</label><input id="name" name="name"
                    value="{{ old('name', $category->name) }}" required autofocus></div>
            <div class="field field--full"><label for="description">Mô tả</label>
                <textarea id="description" name="description">{{ old('description', $category->description) }}</textarea>
            </div>
        </div>@php($cancelUrl = route('admin.post-categories.index'))@php($submitLabel = 'Lưu thay đổi')@include('admin.partials.form-actions')</form>
@endsection
