@extends('admin.layouts.app')

@section('title', 'Tổng quan')
@section('eyebrow', 'Workspace overview')

@section('content')
    <div class="page-heading">
        <div>
            <p class="eyebrow">Xin chào, {{ auth()->user()->name }}</p>
            <h1>Tổng quan studio</h1>
            <p class="lede">Một nơi gọn gàng để giữ các bộ ảnh, dự án và câu chuyện của bạn.</p>
        </div>
        <a class="button button--primary" href="{{ route('admin.projects.create') }}">+ Thêm dự án</a>
    </div>

    <div class="stats-grid">
        <a class="stat-card" href="{{ route('admin.bookings.index') }}"><span>Booking</span><strong>{{ $bookingCount }}</strong><small>{{ $pendingBookingCount }} booking mới chờ xử lý</small></a>
        <a class="stat-card" href="{{ route('admin.projects.index') }}"><span>Dự án đã chụp</span><strong>{{ $projectCount }}</strong><small>Quản lý portfolio</small></a>
        <a class="stat-card" href="{{ route('admin.posts.index') }}"><span>Bài viết</span><strong>{{ $postCount }}</strong><small>Nhật ký và câu chuyện</small></a>
    </div>

    <section class="content-section">
        <div class="section-heading"><div><p class="eyebrow">Đặt lịch</p><h2>Booking gần đây</h2></div><a href="{{ route('admin.bookings.index') }}">Xem tất cả →</a></div>
        @if ($recentBookings->isEmpty())
            <div class="empty-state">Chưa có booking nào.</div>
        @else
            <div class="table-wrap"><table><thead><tr><th>Khách hàng</th><th>Gói chụp</th><th>Ngày chụp</th><th>Trạng thái</th></tr></thead><tbody>
                @foreach ($recentBookings as $booking)<tr><td><strong>{{ $booking->name }}</strong><small>{{ $booking->email }}</small></td><td>{{ $booking->package }}</td><td>{{ $booking->booking_date->format('d/m/Y') }}</td><td><span class="status status--{{ $booking->status }}">{{ ['pending' => 'Chờ xử lý', 'confirmed' => 'Đã xác nhận', 'completed' => 'Hoàn tất', 'cancelled' => 'Đã hủy'][$booking->status] }}</span></td></tr>@endforeach
            </tbody></table></div>
        @endif
    </section>

    <section class="content-section">
        <div class="section-heading"><div><p class="eyebrow">Gần đây</p><h2>Dự án mới nhất</h2></div><a href="{{ route('admin.projects.index') }}">Xem tất cả →</a></div>
        @if ($recentProjects->isEmpty())
            <div class="empty-state">Chưa có dự án nào. Bắt đầu lưu lại một bộ ảnh đầu tiên.</div>
        @else
            <div class="table-wrap"><table><thead><tr><th>Tên dự án</th><th>Danh mục</th><th>Ngày chụp</th><th>Trạng thái</th></tr></thead><tbody>
                @foreach ($recentProjects as $project)<tr><td><strong>{{ $project->title }}</strong><small>{{ $project->excerpt ?: 'Chưa có mô tả' }}</small></td><td>{{ optional($project->category)->name ?: 'Chưa phân loại' }}</td><td>{{ optional($project->shot_at)->format('d/m/Y') ?: '—' }}</td><td><span class="status status--{{ $project->status }}">{{ $project->status === 'published' ? 'Đã xuất bản' : 'Bản nháp' }}</span></td></tr>@endforeach
            </tbody></table></div>
        @endif
    </section>
@endsection
