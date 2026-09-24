<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['category_id', 'title', 'slug', 'excerpt', 'images', 'status', 'shot_at'];

    protected $casts = [
        'shot_at' => 'date',
        'images' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
