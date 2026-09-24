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
    <form class="form-panel" method="POST" action="{{ route('admin.categories.store') }}">@csrf<div class="form-grid">
            <div class="field field--full"><label for="name">Tên danh mục</label><input id="name" name="name"
                    value="{{ old('name') }}" required autofocus></div>
            <div class="field field--full"><label for="description">Mô tả</label>
                <textarea id="description" name="description">{{ old('description') }}</textarea>
            </div>
        </div>@php($cancelUrl = route('admin.categories.index'))@php($submitLabel = 'Tạo danh mục')@include('admin.partials.form-actions')</form>
@endsection
