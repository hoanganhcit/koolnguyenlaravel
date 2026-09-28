<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'package', 'price', 'name', 'email', 'phone', 'booking_date', 'message', 'status',
    ];

    protected $casts = [
        'booking_date' => 'date',
    ];
}