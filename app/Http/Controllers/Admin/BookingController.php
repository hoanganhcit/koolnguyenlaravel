<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return view('admin.bookings.index', [
            'bookings' => Booking::with('category')->latest()->paginate(10),
            'pendingCount' => Booking::where('status', 'pending')->count(),
            'completedCount' => Booking::where('status', 'completed')->count(),
            'cancelledCount' => Booking::where('status', 'cancelled')->count(),
            'revenue' => Booking::where('status', 'completed')->sum('price'),
        ]);
    }

    public function update(Request $request, Booking $booking)
    {
        $data = $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        if (in_array($booking->status, ['completed', 'cancelled'], true)) {
            return back()->withErrors('Booking đã kết thúc và không thể thay đổi trạng thái.');
        }

        $booking->update($data);

        return back()->with('success', 'Đã cập nhật trạng thái booking.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return back()->with('success', 'Đã xóa booking.');
    }
}