<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', ['posts' => Post::with('category')->latest()->get()]);
    }

    public function create()
    {
        return view('admin.posts.create', ['categories' => PostCategory::orderBy('name')->get()]);
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => PostCategory::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'post_category_id' => 'nullable|exists:post_categories,id',
            'title' => 'required|string|max:180', 'excerpt' => 'nullable|string|max:1000',
            'content' => 'nullable|string', 'status' => 'required|in:draft,published',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp,gif|max:10240',
        ]);
        $data['slug'] = Str::slug($data['title']);
        $data['published_at'] = $data['status'] === 'published' ? now() : null;
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('posts', 'public');
        }
        Post::create($data);
        return redirect()->route('admin.posts.index')->with('success', 'Đã lưu bài viết.');
    }

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'post_category_id' => 'nullable|exists:post_categories,id',
            'title' => 'required|string|max:180', 'excerpt' => 'nullable|string|max:1000',
            'content' => 'nullable|string', 'status' => 'required|in:draft,published',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp,gif|max:10240',
            'remove_image' => 'nullable|boolean',
        ]);
        $data['slug'] = Str::slug($data['title']);
        if ($data['status'] === 'published' && $post->status !== 'published') {
            $data['published_at'] = now();
        } elseif ($data['status'] !== 'published') {
            $data['published_at'] = null;
        }

        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $data['image'] = $request->file('image')->store('posts', 'public');
        } elseif ($request->boolean('remove_image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $data['image'] = null;
        }
        unset($data['remove_image']);

        $post->update($data);
        return redirect()->route('admin.posts.index')->with('success', 'Đã cập nhật bài viết.');
    }

    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();
        return back()->with('success', 'Đã xóa bài viết.');
    }

    public function uploadContentImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,jpg,png,webp,gif|max:10240',
        ]);

        $path = $request->file('file')->store('posts/content', 'public');

        return response()->json(['location' => asset('public/storage/' . $path)]);
    }
}
