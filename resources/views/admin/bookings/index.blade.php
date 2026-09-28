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

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Khách hàng</th>
                    <th>Gói chụp / Giá</th>
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
                        <td>{{ $booking->package }}<small>{{ $booking->price ? '$' . number_format($booking->price, 2) : 'Báo giá riêng' }}</small></td>
                        <td>{{ $booking->booking_date->format('d/m/Y') }}</td>
                        <td>
                            <a href="mailto:{{ $booking->email }}">{{ $booking->email }}</a>
                            <small>{{ $booking->phone }}</small>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('admin.bookings.update', $booking) }}">
                                @csrf
                                @method('PUT')
                                <select name="status" onchange="this.form.submit()">
                                    @foreach (['pending' => 'Chờ xử lý', 'confirmed' => 'Đã xác nhận', 'completed' => 'Hoàn tất', 'cancelled' => 'Đã hủy'] as $value => $label)
                                        <option value="{{ $value }}" {{ $booking->status === $value ? 'selected' : '' }}>{{ $label }}</option>
                                    @endforeach
                                </select>
                            </form>
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
