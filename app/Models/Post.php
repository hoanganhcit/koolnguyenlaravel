<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'post_category_id', 'title', 'slug', 'excerpt', 'content', 'image',
        'comments_count', 'likes_count', 'status', 'published_at',
    ];

    protected $casts = ['published_at' => 'datetime'];

    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }
}
