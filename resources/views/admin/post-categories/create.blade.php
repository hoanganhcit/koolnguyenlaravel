@extends('admin.layouts.app')
@section('title', 'Thêm danh mục bài viết')
@section('eyebrow', 'Editorial / Post Categories / New')
@section('content')
    <div class="list-header">
        <div>
            <p class="eyebrow">Danh mục bài viết</p>
            <h1>Thêm danh mục</h1>
            <p>Tạo một chủ đề mới cho bài viết.</p>
        </div>
    </div>
    <form class="form-panel" method="POST" action="{{ route('admin.post-categories.store') }}">@csrf<div class="form-grid">
            <div class="field field--full"><label for="name">Tên danh mục</label><input id="name" name="name"
                    value="{{ old('name') }}" required autofocus></div>
            <div class="field field--full"><label for="description">Mô tả</label>
                <textarea id="description" name="description">{{ old('description') }}</textarea>
            </div>
        </div>@php($cancelUrl = route('admin.post-categories.index'))@php($submitLabel = 'Tạo danh mục')@include('admin.partials.form-actions')</form>
@endsection
