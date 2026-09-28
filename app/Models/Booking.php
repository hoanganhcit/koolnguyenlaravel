<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'package', 'category_id', 'price', 'name', 'email', 'phone', 'booking_date', 'message', 'status',
    ];

    protected $casts = [
        'booking_date' => 'date',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}