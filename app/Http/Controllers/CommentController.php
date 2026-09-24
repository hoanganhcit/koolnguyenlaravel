<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        abort_unless($post->status === 'published', 404);

        $data = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:180',
            'content' => 'required|string|max:2000',
        ]);

        $post->comments()->create($data);

        return redirect(route('blog.show', $post->slug) . '#comments')
            ->with('success', 'Cảm ơn bạn đã bình luận!');
    }
}
