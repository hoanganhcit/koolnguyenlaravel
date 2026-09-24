@extends('admin.layouts.app')
@section('title', 'Viết bài mới')
@section('eyebrow', 'Editorial / Posts / New')
@section('content')
    <div class="list-header">
        <div>
            <p class="eyebrow">Quản lý bài viết</p>
            <h1>Viết bài mới</h1>
            <p>Chia sẻ một lát cắt từ công việc và đời sống hình ảnh.</p>
        </div>
    </div>
    <form class="form-panel form-post-container" method="POST" action="{{ route('admin.posts.store') }}"
        enctype="multipart/form-data">@csrf<div class="form-grid">
            <div class="field field--full"><label for="title">Tiêu đề</label><input id="title" name="title"
                    value="{{ old('title') }}" required autofocus></div>
            <div class="field field--full"><label for="image">Ảnh đại diện</label>
                <input id="image" name="image" type="file" accept="image/jpeg,image/png,image/webp,image/gif">
                <small class="field-help">Ảnh hiển thị đại diện cho bài viết trên trang blog. Tối đa 10 MB.</small>
                <div id="image-preview" class="image-preview" aria-live="polite"></div>
            </div>
            <div class="field"><label for="post_category_id">Danh mục</label><select id="post_category_id"
                    name="post_category_id">
                    <option value="">Chưa phân loại</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('post_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select></div>
            <div class="field"><label for="status">Trạng thái</label><select id="status" name="status">
                    <option value="draft">Bản nháp</option>
                    <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Đã đăng</option>
                </select></div>
            <div class="field field--full"><label for="excerpt">Đoạn dẫn</label>
                <textarea id="excerpt" name="excerpt">{{ old('excerpt') }}</textarea>
            </div>
            <div class="field field--full"><label for="content">Nội dung</label>
                <div id="content-editor" class="rich-editor"></div>
                <textarea id="content" name="content" class="rich-editor__source">{{ old('content') }}</textarea>
            </div>
        </div>
        @php($cancelUrl = route('admin.posts.index'))
        @php($submitLabel = 'Lưu bài viết')
        @include('admin.partials.form-actions')
    </form>
@endsection

@push('styles')
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
    <style>
        .rich-editor__source {
            display: none;
        }

        .rich-editor {
            background: #fff;
            min-height: 280px;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
    <script>
        (function() {
            var input = document.getElementById('image');
            var preview = document.getElementById('image-preview');

            input.addEventListener('change', function() {
                preview.innerHTML = '';
                var file = input.files[0];
                if (!file) return;

                var item = document.createElement('div');
                var image = document.createElement('img');
                image.src = URL.createObjectURL(file);
                image.alt = file.name;
                item.className = 'image-preview__item';
                item.appendChild(image);
                preview.appendChild(item);
            });
        }());
    </script>
    <script>
        (function() {
            var source = document.getElementById('content');
            var quill = new Quill('#content-editor', {
                modules: {
                    toolbar: {
                        container: [
                            [{
                                font: []
                            }, {
                                size: ['small', false, 'large', 'huge']
                            }],
                            [{
                                header: [1, 2, 3, 4, 5, 6, false]
                            }],
                            ['bold', 'italic', 'underline', 'strike'],
                            [{
                                color: []
                            }, {
                                background: []
                            }],
                            [{
                                script: 'sub'
                            }, {
                                script: 'super'
                            }],
                            ['blockquote', 'code-block'],
                            [{
                                list: 'ordered'
                            }, {
                                list: 'bullet'
                            }, {
                                indent: '-1'
                            }, {
                                indent: '+1'
                            }],
                            [{
                                align: []
                            }, {
                                direction: 'rtl'
                            }],
                            ['link', 'image', 'video'],
                            ['clean']
                        ],
                        handlers: {
                            image: function() {
                                var input = document.createElement('input');
                                input.setAttribute('type', 'file');
                                input.setAttribute('accept', 'image/*');
                                input.click();
                                input.onchange = function() {
                                    var file = input.files[0];
                                    if (!file) return;

                                    var formData = new FormData();
                                    formData.append('file', file);

                                    fetch('{{ route('admin.posts.upload-image') }}', {
                                            method: 'POST',
                                            headers: {
                                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                            },
                                            body: formData
                                        })
                                        .then(function(response) {
                                            return response.json();
                                        })
                                        .then(function(data) {
                                            var range = quill.getSelection(true);
                                            quill.insertEmbed(range.index, 'image', data.location,
                                                'user');
                                            quill.setSelection(range.index + 1);
                                        });
                                };
                            }
                        }
                    }
                },
                theme: 'snow'
            });
            quill.root.innerHTML = source.value;
            quill.on('text-change', function() {
                source.value = quill.root.innerHTML;
            });
            source.closest('form').addEventListener('submit', function() {
                source.value = quill.root.innerHTML;
            });
        }());
    </script>
@endpush
