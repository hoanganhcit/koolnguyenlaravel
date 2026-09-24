@extends('admin.layouts.app')
@section('title', 'Quản lý bài viết')
@section('eyebrow', 'Editorial / Posts')
@section('content')
    <div class="list-header">
        <div>
            <p class="eyebrow">Editorial</p>
            <h1>Quản lý bài viết</h1>
            <p>Viết về hậu trường, cảm hứng và những câu chuyện sau mỗi buổi chụp.</p>
        </div><a class="button button--primary" href="{{ route('admin.posts.create') }}">+ Viết bài mới</a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Tiêu đề</th>
                    <th>Danh mục</th>
                    <th>Ngày đăng</th>
                    <th>Trạng thái</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td style="width: 50%;"><strong>{{ $post->title }}</strong><small>{{ $post->excerpt ?: 'Chưa có đoạn dẫn' }}</small>
                        </td>
                        <td>{{ optional($post->category)->name ?: 'Chưa phân loại' }}</td>
                        <td>{{ optional($post->published_at)->format('d/m/Y') ?: '—' }}</td>
                        <td><span
                                class="status status--{{ $post->status }}">{{ $post->status === 'published' ? 'Đã đăng' : 'Bản nháp' }}</span>
                        </td>
                        <td>
                            <a class="icon-action" href="{{ route('admin.posts.edit', $post) }}" title="Sửa bài viết"
                                aria-label="Sửa bài viết">&#9998;</a>
                            <form class="inline-form" method="POST" action="{{ route('admin.posts.destroy', $post) }}">@csrf
                                @method('DELETE')<button class="icon-button" type="submit"
                                    onclick="return confirm('Xóa bài viết này?')">Xóa</button></form>
                        </td>
                </tr>@empty<tr>
                        <td colspan="6">
                            <div class="empty-state">Chưa có bài viết nào.</div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
