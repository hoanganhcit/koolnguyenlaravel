<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    public function index()
    {
        return view('admin.projects.index', ['projects' => Project::with('category')->latest()->get()]);
    }

    public function create()
    {
        return view('admin.projects.create', ['categories' => Category::where('is_active', true)->orderBy('name')->get()]);
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', [
            'project' => $project,
            'categories' => Category::where('is_active', true)->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:180', 'category_id' => 'nullable|exists:categories,id',
            'excerpt' => 'nullable|string|max:1000', 'status' => 'required|in:draft,published', 'shot_at' => 'nullable|date',
            'images' => 'nullable|array', 'images.*' => 'image|mimes:jpeg,jpg,png,webp,gif|max:10240',
        ]);
        $data['slug'] = Str::slug($data['title']);
        $data['images'] = collect($request->file('images', []))
            ->map(function ($image) {
                return $image->store('projects', 'public');
            })->values()->all();
        Project::create($data);
        return redirect()->route('admin.projects.index')->with('success', 'Đã lưu dự án.');
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string|max:180', 'category_id' => 'nullable|exists:categories,id',
            'excerpt' => 'nullable|string|max:1000', 'status' => 'required|in:draft,published', 'shot_at' => 'nullable|date',
            'images' => 'nullable|array', 'images.*' => 'image|mimes:jpeg,jpg,png,webp,gif|max:10240',
            'remove_images' => 'nullable|array', 'remove_images.*' => 'string',
        ]);
        $slug = Str::slug($data['title']);
        validator(['slug' => $slug], [
            'slug' => [Rule::unique('projects', 'slug')->ignore($project->id)],
        ])->validate();

        $currentImages = $project->images ?: [];
        $removeImages = array_values(array_intersect($currentImages, $request->input('remove_images', [])));
        foreach ($removeImages as $image) {
            Storage::disk('public')->delete($image);
        }

        $newImages = collect($request->file('images', []))->map(function ($image) {
            return $image->store('projects', 'public');
        })->values()->all();

        $data['slug'] = $slug;
        $data['images'] = array_values(array_merge(array_diff($currentImages, $removeImages), $newImages));
        unset($data['remove_images']);
        $project->update($data);

        return redirect()->route('admin.projects.index')->with('success', 'Đã cập nhật dự án.');
    }

    public function destroy(Project $project)
    {
        foreach ($project->images ?: [] as $image) {
            Storage::disk('public')->delete($image);
        }
        $project->delete();
        return back()->with('success', 'Đã xóa dự án.');
    }
}
