<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.categories.index', ['categories' => Category::withCount('projects')->latest()->get()]);
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required|string|max:120', 'description' => 'nullable|string|max:1000']);
        $data['slug'] = Str::slug($data['name']);
        Category::create($data);
        return redirect()->route('admin.categories.index')->with('success', 'Đã thêm danh mục.');
    }

    public function update(Request $request, Category $category)
    {
        $slug = Str::slug($request->input('name'));
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'description' => ['nullable', 'string', 'max:1000'],
        ]);
        validator(['slug' => $slug], [
            'slug' => [Rule::unique('categories', 'slug')->ignore($category->id)],
        ])->validate();
        $data['slug'] = $slug;
        $category->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'Đã cập nhật danh mục.');
    }

    public function destroy(Category $category)
    {
        $category->projects()->update(['category_id' => null]);
        $category->delete();
        return back()->with('success', 'Đã xóa danh mục.');
    }
}
