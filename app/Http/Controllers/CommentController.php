<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return view('admin.comments.index', [
            'comments' => Comment::with('post')->latest()->paginate(20),
        ]);
    }

    public function store(Request $request, Post $post)
    {
        abort_unless($post->status === 'published', 404);

        $data = $request->validate([
            'name' => 'required|string|max:120',
            'email' => 'required|email|max:180',
            'content' => 'required|string|max:2000',
        ]);

        $comment = $post->comments()->create($data);

        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'Thank you for your comment!',
                'comment' => [
                    'name' => $comment->name,
                    'email' => $comment->email,
                    'content' => $comment->content,
                    'date' => $comment->created_at->format('d F Y'),
                    'avatar' => 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($comment->email))) . '?d=mp&s=80',
                ],
            ], 201);
        }

        return redirect(route('blog.show', $post->slug) . '#comments')
            ->with('success', 'Thank you for your comment!');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('admin.comments.index')
            ->with('success', 'Comment has been deleted.');
    }
}
