@extends('admin.layouts.app')
@section('title', 'Thêm dự án')
@section('eyebrow', 'Portfolio / Projects / New')
@section('content')
    <div class="list-header">
        <div>
            <p class="eyebrow">Dự án đã chụp</p>
            <h1>Thêm dự án</h1>
            <p>Ghi lại một bộ ảnh mới vào portfolio.</p>
        </div>
    </div>
    <form class="form-panel" method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">@csrf<div class="form-grid">
            <div class="field field--full"><label for="title">Tên dự án</label><input id="title" name="title"
                    value="{{ old('title') }}" required autofocus></div>
            <div class="field"><label for="category_id">Danh mục</label><select id="category_id" name="category_id">
                    <option value="">Chưa phân loại</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select></div>
            <div class="field"><label for="shot_at">Ngày chụp</label><input id="shot_at" name="shot_at" type="date"
                    value="{{ old('shot_at') }}"></div>
            <div class="field"><label for="status">Trạng thái</label><select id="status" name="status">
                    <option value="draft">Bản nháp</option>
                    <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Đã xuất bản</option>
                </select></div>
            <div class="field field--full"><label for="images">Ảnh dự án</label>
                <input id="images" name="images[]" type="file" accept="image/jpeg,image/png,image/webp,image/gif" multiple>
                <small class="field-help">Có thể chọn nhiều ảnh. Mỗi ảnh tối đa 10 MB.</small>
                <div id="image-preview" class="image-preview" aria-live="polite"></div>
            </div>
            <div class="field field--full"><label for="excerpt">Mô tả ngắn</label>
                <textarea id="excerpt" name="excerpt">{{ old('excerpt') }}</textarea>
            </div>
        </div>@php($cancelUrl = route('admin.projects.index'))@php($submitLabel = 'Lưu dự án')@include('admin.partials.form-actions')</form>
    <script>
        (function () {
            const input = document.getElementById('images');
            const preview = document.getElementById('image-preview');
            let files = [];

            function renderPreview() {
                preview.innerHTML = '';
                files.forEach(function (file, index) {
                    const item = document.createElement('div');
                    const image = document.createElement('img');
                    const remove = document.createElement('button');
                    image.src = URL.createObjectURL(file);
                    image.alt = file.name;
                    remove.type = 'button';
                    remove.className = 'image-preview__remove';
                    remove.textContent = 'Xóa';
                    remove.addEventListener('click', function () {
                        files.splice(index, 1);
                        syncInput();
                        renderPreview();
                    });
                    item.className = 'image-preview__item';
                    item.append(image, remove);
                    preview.appendChild(item);
                });
            }

            function syncInput() {
                const transfer = new DataTransfer();
                files.forEach(function (file) { transfer.items.add(file); });
                input.files = transfer.files;
            }

            input.addEventListener('change', function () {
                files = Array.from(input.files);
                renderPreview();
            });
        }());
    </script>
@endsection
