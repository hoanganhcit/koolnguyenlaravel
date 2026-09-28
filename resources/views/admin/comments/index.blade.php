@extends('admin.layouts.app')
@section('title', 'Quản lý bình luận')
@section('eyebrow', 'Editorial / Comments')
@section('content')
    <div class="list-header">
        <div>
            <p class="eyebrow">Editorial</p>
            <h1>Quản lý bình luận</h1>
            <p>Theo dõi phản hồi từ độc giả trên các bài viết.</p>
        </div>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Người gửi</th>
                    <th>Nội dung</th>
                    <th>Bài viết</th>
                    <th>Ngày gửi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($comments as $comment)
                    <tr>
                        <td>
                            <strong>{{ $comment->name }}</strong>
                            <small>{{ $comment->email }}</small>
                        </td>
                        <td style="max-width: 420px; white-space: normal;">{{ $comment->content }}</td>
                        <td>{{ optional($comment->post)->title ?: 'Bài viết đã xóa' }}</td>
                        <td>{{ $comment->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <form class="inline-form" method="POST"
                                action="{{ route('admin.comments.destroy', $comment) }}">
                                @csrf
                                @method('DELETE')
                                <button class="icon-button" type="submit"
                                    onclick="return confirm('Xóa bình luận này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            <div class="empty-state">Chưa có bình luận nào.</div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $comments->links() }}
@endsection
