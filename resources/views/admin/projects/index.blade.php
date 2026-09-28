@extends('admin.layouts.app')
@section('title', 'Dự án đã chụp')
@section('eyebrow', 'Portfolio / Projects')
@section('content')
    <div class="list-header">
        <div>
            <p class="eyebrow">Portfolio</p>
            <h1>Dự án đã chụp</h1>
            <p>Lưu lại những câu chuyện hình ảnh đã hoàn thành.</p>
        </div><a class="button button--primary" href="{{ route('admin.projects.create') }}">+ Thêm dự án</a>
    </div>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Dự án</th>
                    <th>Danh mục</th>
                    <th>Ngày chụp</th>
                    <th>Trạng thái</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                    <tr>
                        <td style="width: 50%"><strong>{{ $project->title }}</strong><small>{{ $project->excerpt ?: 'Chưa có mô tả ngắn' }}</small>
                        </td>
                        <td>{{ optional($project->category)->name ?: 'Chưa phân loại' }}</td>
                        <td>{{ optional($project->shot_at)->format('d/m/Y') ?: '—' }}</td>
                        <td><span
                                class="status status--{{ $project->status }}">{{ $project->status === 'published' ? 'Đã xuất bản' : 'Bản nháp' }}</span>
                        </td>
                        <td>
                            <a class="icon-action" href="{{ route('admin.projects.edit', $project) }}"
                                title="Sửa dự án" aria-label="Sửa dự án">&#9998;</a>
                            <form class="inline-form" method="POST" action="{{ route('admin.projects.destroy', $project) }}">
                                @csrf @method('DELETE')<button class="icon-action icon-action--danger" type="submit"
                                    title="Xóa dự án" aria-label="Xóa dự án"
                                    onclick="return confirm('Xóa dự án này?')">&#128465;</button></form>
                        </td>
                </tr>@empty<tr>
                        <td colspan="5">
                            <div class="empty-state">Chưa có dự án nào.</div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $projects->links() }}
@endsection
