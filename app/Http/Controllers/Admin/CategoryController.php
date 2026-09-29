<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

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
        $data = $request->validate([
            'name' => 'required|string|max:120', 'description' => 'nullable|string|max:1000',
            'price' => 'nullable|numeric|min:0', 'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:20480',
            'features' => 'nullable|string|max:3000',
        ]);
        $data['slug'] = Str::slug($data['name']);
        $data['features'] = $this->features($request->input('features'));
        if ($request->hasFile('image')) $data['image'] = $request->file('image')->store('categories', 'public');
        Category::create($data);
        return redirect()->route('admin.categories.index')->with('success', 'Đã thêm danh mục.');
    }

    public function update(Request $request, Category $category)
    {
        $slug = Str::slug($request->input('name'));
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'description' => ['nullable', 'string', 'max:1000'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:20480'],
            'features' => ['nullable', 'string', 'max:3000'],
            'remove_image' => ['nullable', 'boolean'],
        ]);
        validator(['slug' => $slug], [
            'slug' => [Rule::unique('categories', 'slug')->ignore($category->id)],
        ])->validate();
        $data['slug'] = $slug;
        $data['features'] = $this->features($request->input('features'));
        if ($request->hasFile('image')) {
            if ($category->image) Storage::disk('public')->delete($category->image);
            $data['image'] = $request->file('image')->store('categories', 'public');
        } elseif ($request->boolean('remove_image')) {
            if ($category->image) Storage::disk('public')->delete($category->image);
            $data['image'] = null;
        }
        unset($data['remove_image']);
        $category->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'Đã cập nhật danh mục.');
    }

    public function destroy(Category $category)
    {
        if ($category->image) Storage::disk('public')->delete($category->image);
        $category->projects()->update(['category_id' => null]);
        $category->delete();
        return back()->with('success', 'Đã xóa danh mục.');
    }

    private function features($value)
    {
        return collect(preg_split('/\r\n|\r|\n/', (string) $value))
            ->map(function ($feature) { return trim(preg_replace('/^[-*]\s*/', '', $feature)); })
            ->filter()
            ->values()
            ->all();
    }
}
