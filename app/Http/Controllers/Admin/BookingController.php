<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->validate([
            'tab' => 'nullable|in:management,analytics',
            'from' => 'nullable|date',
            'to' => 'nullable|date|after_or_equal:from',
            'group' => 'nullable|in:day,month',
        ]);

        $activeTab = $filters['tab'] ?? 'management';
        $from = $filters['from'] ?? now()->startOfMonth()->toDateString();
        $to = $filters['to'] ?? now()->toDateString();
        $group = $filters['group'] ?? 'month';

        $analyticsRows = Booking::where('status', 'completed')
            ->whereBetween('booking_date', [$from, $to])
            ->get(['booking_date', 'price'])
            ->groupBy(function ($booking) use ($group) {
                return $booking->booking_date->format($group === 'day' ? 'Y-m-d' : 'Y-m');
            })
            ->map(function ($bookings, $period) use ($group) {
                return [
                    'period' => $period,
                    'label' => date($group === 'day' ? 'd/m/Y' : 'm/Y', strtotime($period)),
                    'count' => $bookings->count(),
                    'revenue' => (float) $bookings->sum('price'),
                ];
            })
            ->sortKeys()
            ->values();

        return view('admin.bookings.index', [
            'bookings' => Booking::with('category')->latest()->paginate(10)->appends($request->query()),
            'pendingCount' => Booking::where('status', 'pending')->count(),
            'completedCount' => Booking::where('status', 'completed')->count(),
            'cancelledCount' => Booking::where('status', 'cancelled')->count(),
            'revenue' => Booking::where('status', 'completed')->sum('price'),
            'activeTab' => $activeTab,
            'analyticsFrom' => $from,
            'analyticsTo' => $to,
            'analyticsGroup' => $group,
            'analyticsRows' => $analyticsRows,
            'analyticsRevenue' => $analyticsRows->sum('revenue'),
            'analyticsMaxRevenue' => $analyticsRows->max('revenue') ?: 0,
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