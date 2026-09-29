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

    <nav class="booking-tabs" aria-label="Booking views">
        <a href="{{ route('admin.bookings.index', ['tab' => 'management']) }}" class="{{ $activeTab === 'management' ? 'is-active' : '' }}" @if ($activeTab === 'management') aria-current="page" @endif>Quản lý booking</a>
        <a href="{{ route('admin.bookings.index', ['tab' => 'analytics']) }}" class="{{ $activeTab === 'analytics' ? 'is-active' : '' }}" @if ($activeTab === 'analytics') aria-current="page" @endif>Analytics</a>
    </nav>

    @if ($activeTab === 'management')
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
    @else
        <form class="analytics-filters" method="GET" action="{{ route('admin.bookings.index') }}">
            <input type="hidden" name="tab" value="analytics">
            <div class="field">
                <label for="analytics-from">Từ ngày</label>
                <input id="analytics-from" type="date" name="from" value="{{ $analyticsFrom }}" required>
            </div>
            <div class="field">
                <label for="analytics-to">Đến ngày</label>
                <input id="analytics-to" type="date" name="to" value="{{ $analyticsTo }}" required>
            </div>
            <div class="field">
                <label for="analytics-group">Nhóm doanh thu</label>
                <select id="analytics-group" name="group">
                    <option value="month" {{ $analyticsGroup === 'month' ? 'selected' : '' }}>Theo tháng</option>
                    <option value="day" {{ $analyticsGroup === 'day' ? 'selected' : '' }}>Theo ngày</option>
                </select>
            </div>
            <button class="button button--primary" type="submit">Xem báo cáo</button>
        </form>

        <div class="stats-grid analytics-stats">
            <div class="stat-card"><span>Doanh thu</span><strong>${{ number_format($analyticsRevenue, 2) }}</strong><small>Booking đã hoàn tất trong khoảng ngày đã chọn</small></div>
            <div class="stat-card"><span>Booking hoàn tất</span><strong>{{ $analyticsRows->sum('count') }}</strong><small>{{ $analyticsFrom }} đến {{ $analyticsTo }}</small></div>
        </div>

        <div class="table-wrap">
            <table>
                <thead>
                    <tr><th>{{ $analyticsGroup === 'day' ? 'Ngày' : 'Tháng' }}</th><th>Số booking</th><th>Doanh thu</th><th>So sánh</th></tr>
                </thead>
                <tbody>
                    @forelse ($analyticsRows as $row)
                        <tr>
                            <td><strong>{{ $row['label'] }}</strong></td>
                            <td>{{ $row['count'] }}</td>
                            <td><strong>${{ number_format($row['revenue'], 2) }}</strong></td>
                            <td><div class="analytics-bar"><span style="width: {{ $analyticsMaxRevenue > 0 ? ($row['revenue'] / $analyticsMaxRevenue) * 100 : 0 }}%"></span></div></td>
                        </tr>
                    @empty
                        <tr><td colspan="4"><div class="empty-state">Không có booking hoàn tất trong khoảng thời gian này.</div></td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endif
@endsection
