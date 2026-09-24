@extends('admin.layouts.app')
@section('title', 'Danh mục chụp hình')
@section('eyebrow', 'Content / Categories')
@section('content')
    <div class="list-header">
        <div>
            <p class="eyebrow">Bộ sưu tập</p>
            <h1>Danh mục chụp hình</h1>
            <p>Phân loại các thể loại và bộ ảnh của studio.</p>
        </div><a class="button button--primary" href="{{ route('admin.categories.create') }}">+ Thêm danh mục</a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Tên danh mục</th>
                    <th>Slug</th>
                    <th>Số dự án</th>
                    <th>Trạng thái</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td><strong>{{ $category->name }}</strong><small>{{ $category->description ?: 'Chưa có mô tả' }}</small>
                        </td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->projects_count }}</td>
                        <td><span class="status">{{ $category->is_active ? 'Đang dùng' : 'Ẩn' }}</span></td>
                        <td>
                            <a class="icon-action" href="{{ route('admin.categories.edit', $category) }}"
                                title="Sửa danh mục" aria-label="Sửa danh mục">&#9998;</a>
                            <form class="inline-form" method="POST"
                                action="{{ route('admin.categories.destroy', $category) }}">
                                @csrf @method('DELETE')
                                <button class="icon-action icon-action--danger" type="submit"
                                    title="Xóa danh mục" aria-label="Xóa danh mục"
                                    onclick="return confirm('Xóa danh mục này?')">&#128465;</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            <div class="empty-state">Chưa có danh mục nào.</div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
