<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $packagePrices = [
            'Model Photography' => 39,
            'Photography of events' => 59,
            'Corporate photography' => 99,
            'Photography for movies' => null,
        ];

        $data = $request->validate([
            'package' => 'required|string|in:' . implode(',', array_keys($packagePrices)),
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:180',
            'phone' => 'required|string|max:40',
            'date' => 'required|date|after_or_equal:today',
            'message' => 'nullable|string|max:2000',
        ]);

        $booking = Booking::create([
            'package' => $data['package'],
            'price' => $packagePrices[$data['package']],
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'booking_date' => $data['date'],
            'message' => $data['message'] ?? null,
        ]);

        $content = implode(PHP_EOL, [
            'New photography booking request',
            'Package: ' . $data['package'],
            'Price: ' . ($packagePrices[$data['package']] ? '$' . $packagePrices[$data['package']] : 'Individual pricing'),
            'Name: ' . $data['name'],
            'Email: ' . $data['email'],
            'Phone: ' . $data['phone'],
            'Preferred date: ' . $data['date'],
            '',
            $data['message'] ?: 'No additional message.',
        ]);

        try {
            Mail::raw($content, function ($mail) use ($data) {
                $mail->to(config('mail.contact_to'))
                    ->replyTo($data['email'], $data['name'])
                    ->subject('Booking request: ' . $data['package']);
            });
        } catch (\Throwable $exception) {
            Log::warning('Booking email could not be sent.', [
                'booking_id' => $booking->id,
                'error' => $exception->getMessage(),
            ]);
        }

        return response()->json([
            'message' => 'Thank you. Your booking request has been submitted successfully.',
        ], 201);
    }
}