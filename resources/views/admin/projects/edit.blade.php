@extends('admin.layouts.app')
@section('title', 'Sửa dự án')
@section('eyebrow', 'Portfolio / Projects / Edit')
@section('content')
    <div class="list-header">
        <div>
            <p class="eyebrow">Dự án đã chụp</p>
            <h1>Sửa dự án</h1>
            <p>Cập nhật thông tin và gallery ảnh của {{ $project->title }}.</p>
        </div>
    </div>
    <form class="form-panel" method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="form-grid">
            <div class="field field--full"><label for="title">Tên dự án</label><input id="title" name="title"
                    value="{{ old('title', $project->title) }}" required autofocus></div>
            <div class="field"><label for="category_id">Danh mục</label><select id="category_id" name="category_id">
                    <option value="">Chưa phân loại</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $project->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select></div>
            <div class="field"><label for="shot_at">Ngày chụp</label><input id="shot_at" name="shot_at" type="date"
                    value="{{ old('shot_at', optional($project->shot_at)->format('Y-m-d')) }}"></div>
            <div class="field"><label for="status">Trạng thái</label><select id="status" name="status">
                    <option value="draft" {{ old('status', $project->status) === 'draft' ? 'selected' : '' }}>Bản nháp</option>
                    <option value="published" {{ old('status', $project->status) === 'published' ? 'selected' : '' }}>Đã xuất bản</option>
                </select></div>
            <div class="field field--full"><label>Ảnh hiện tại</label>
                <div class="image-preview image-preview--existing" aria-live="polite">
                    @forelse ($project->images ?: [] as $image)
                        <div class="image-preview__item" data-existing-image>
                            <img src="{{ asset('public/storage/' . $image) }}" alt="Ảnh {{ $project->title }}">
                            <input type="hidden" name="remove_images[]" value="{{ $image }}" disabled>
                            <button class="image-preview__remove" type="button" title="Xóa ảnh này" aria-label="Xóa ảnh này">Xóa</button>
                        </div>
                    @empty
                        <small class="field-help">Dự án chưa có ảnh.</small>
                    @endforelse
                </div>
            </div>
            <div class="field field--full"><label for="images">Thêm ảnh mới</label>
                <input id="images" name="images[]" type="file" accept="image/jpeg,image/png,image/webp,image/gif" multiple>
                <small class="field-help">Có thể chọn nhiều ảnh. Mỗi ảnh tối đa 20 MB.</small>
                <div id="image-preview" class="image-preview" aria-live="polite"></div>
            </div>
            <div class="field field--full"><label for="excerpt">Mô tả ngắn</label>
                <textarea id="excerpt" name="excerpt">{{ old('excerpt', $project->excerpt) }}</textarea>
            </div>
        </div>
        @php($cancelUrl = route('admin.projects.index'))
        @php($submitLabel = 'Lưu thay đổi')
        @include('admin.partials.form-actions')
    </form>
    <script>
        (function () {
            const input = document.getElementById('images');
            const preview = document.getElementById('image-preview');
            let files = [];

            document.querySelectorAll('[data-existing-image] .image-preview__remove').forEach(function (button) {
                button.addEventListener('click', function () {
                    const item = button.closest('[data-existing-image]');
                    item.querySelector('input[name="remove_images[]"]').disabled = false;
                    item.classList.add('is-removed');
                    button.disabled = true;
                });
            });

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