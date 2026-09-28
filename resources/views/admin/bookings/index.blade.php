@extends('admin.layouts.app')
@section('title', 'Quản lý booking')
@section('eyebrow', 'Studio / Bookings')
@section('content')
    <div class="list-header">
        <div>
            <p class="eyebrow">Studio</p>
            <h1>Quản lý booking</h1>
            <p>Xem lịch chụp, gói dịch vụ và cập nhật trạng thái đăng ký.</p>
        </div>
    </div>

    <div class="stats-grid booking-stats">
        <div class="stat-card"><span>Đang chờ</span><strong>{{ $pendingCount }}</strong><small>Booking cần xử lý</small></div>
        <div class="stat-card"><span>Hoàn tất</span><strong>{{ $completedCount }}</strong><small>Booking đã hoàn thành</small></div>
        <div class="stat-card"><span>Đã hủy</span><strong>{{ $cancelledCount }}</strong><small>Booking đã hủy</small></div>
        <div class="stat-card"><span>Doanh thu</span><strong>${{ number_format($revenue, 2) }}</strong><small>Chỉ tính booking hoàn tất</small></div>
    </div>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Khách hàng</th>
                    <th>Danh mục / Giá</th>
                    <th>Ngày chụp</th>
                    <th>Liên hệ</th>
                    <th>Trạng thái</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bookings as $booking)
                    <tr>
                        <td>
                            <strong>{{ $booking->name }}</strong>
                            <small>{{ $booking->message ?: 'Không có ghi chú' }}</small>
                        </td>
                        <td>{{ optional($booking->category)->name ?: $booking->package }}<small>{{ $booking->price ? '$' . number_format($booking->price, 2) : 'Báo giá riêng' }}</small></td>
                        <td>{{ $booking->booking_date->format('d/m/Y') }}</td>
                        <td>
                            <a href="mailto:{{ $booking->email }}">{{ $booking->email }}</a>
                            <small>{{ $booking->phone }}</small>
                        </td>
                        <td>
                            @if (in_array($booking->status, ['completed', 'cancelled'], true))
                                <span class="status status--{{ $booking->status }}">
                                    {{ $booking->status === 'completed' ? 'Hoàn tất' : 'Đã hủy' }}
                                </span>
                            @else
                                <form method="POST" action="{{ route('admin.bookings.update', $booking) }}">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" onchange="this.form.submit()">
                                        @foreach (['pending' => 'Chờ xử lý', 'confirmed' => 'Đã xác nhận', 'completed' => 'Hoàn tất', 'cancelled' => 'Đã hủy'] as $value => $label)
                                            <option value="{{ $value }}" {{ $booking->status === $value ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </form>
                            @endif
                        </td>
                        <td>
                            <form class="inline-form" method="POST"
                                action="{{ route('admin.bookings.destroy', $booking) }}">
                                @csrf
                                @method('DELETE')
                                <button class="icon-button" type="submit"
                                    onclick="return confirm('Xóa booking này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <div class="empty-state">Chưa có booking nào.</div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{ $bookings->links() }}
@endsection
