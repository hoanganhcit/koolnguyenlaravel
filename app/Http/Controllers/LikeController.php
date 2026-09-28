<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request, Post $post)
    {
        abort_unless($post->status === 'published', 404);

        $post->increment('likes_count');

        return response()->json([
            'likes_count' => $post->fresh()->likes_count,
        ]);
    }
}