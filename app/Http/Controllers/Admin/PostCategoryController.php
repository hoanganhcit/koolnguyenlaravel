<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostCategoryController extends Controller
{
    public function index()
    {
        return view('admin.post-categories.index', ['categories' => PostCategory::withCount('posts')->latest()->get()]);
    }

    public function create()
    {
        return view('admin.post-categories.create');
    }

    public function edit(PostCategory $postCategory)
    {
        return view('admin.post-categories.edit', ['category' => $postCategory]);
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required|string|max:120', 'description' => 'nullable|string|max:1000']);
        $data['slug'] = Str::slug($data['name']);
        PostCategory::create($data);
        return redirect()->route('admin.post-categories.index')->with('success', 'Đã thêm danh mục.');
    }

    public function update(Request $request, PostCategory $postCategory)
    {
        $slug = Str::slug($request->input('name'));
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'description' => ['nullable', 'string', 'max:1000'],
        ]);
        validator(['slug' => $slug], [
            'slug' => [Rule::unique('post_categories', 'slug')->ignore($postCategory->id)],
        ])->validate();
        $data['slug'] = $slug;
        $postCategory->update($data);

        return redirect()->route('admin.post-categories.index')->with('success', 'Đã cập nhật danh mục.');
    }

    public function destroy(PostCategory $postCategory)
    {
        $postCategory->posts()->update(['post_category_id' => null]);
        $postCategory->delete();
        return back()->with('success', 'Đã xóa danh mục.');
    }
}
