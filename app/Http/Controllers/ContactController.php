<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:80',
            'last_name' => 'required|string|max:80',
            'email' => 'required|email|max:180',
            'phone' => 'required|string|max:40',
            'message' => 'required|string|max:3000',
        ]);

        $recipient = config('mail.contact_to');
        $content = implode(PHP_EOL, [
            'New contact message',
            'Name: ' . $data['first_name'] . ' ' . $data['last_name'],
            'Email: ' . $data['email'],
            'Phone: ' . $data['phone'],
            '',
            $data['message'],
        ]);

        Mail::raw($content, function ($mail) use ($recipient, $data) {
            $mail->to($recipient)
                ->replyTo($data['email'], $data['first_name'] . ' ' . $data['last_name'])
                ->subject('New contact message from ' . $data['first_name'] . ' ' . $data['last_name']);
        });

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Thank you. Your message has been sent successfully..',
            ], 201);
        }

        return redirect()->route('contact')->with('success', 'Thank you. Your message has been sent successfully.');
    }
}