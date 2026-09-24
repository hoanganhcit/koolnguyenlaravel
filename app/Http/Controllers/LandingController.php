<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Project;

class LandingController extends Controller
{
    public function index()
    {
        return view('FE.index', [
            'projects' => Project::with('category')
                ->where('status', 'published')
                ->latest('shot_at')
                ->latest()
                ->get(),
            'categories' => $this->publishedCategories(),
        ]);
    }

    public function gallery()
    {
        return view('FE.gallery', [
            'projects' => Project::with('category')
                ->where('status', 'published')
                ->latest('shot_at')
                ->latest()
                ->get(),
            'categories' => $this->publishedCategories(),
        ]);
    }

    public function about()
    {
        return view('FE.about');
    }

    public function contact()
    {
        return view('FE.contact');
    }

    public function blog()
    {
        $posts = Post::with('category')
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->get();

        return view('FE.blog', [
            'posts' => $posts,
            'categories' => $this->publishedPostCategories(),
        ]);
    }

    public function blogShow(Post $post)
    {
        abort_unless($post->status === 'published', 404);

        $publishedPosts = Post::where('status', 'published')->whereNotNull('published_at');

        $previousPost = (clone $publishedPosts)
            ->where('published_at', '>', $post->published_at)
            ->oldest('published_at')
            ->first();

        $nextPost = (clone $publishedPosts)
            ->where('published_at', '<', $post->published_at)
            ->latest('published_at')
            ->first();

        return view('FE.blog-show', [
            'post' => $post->load('comments'),
            'previousPost' => $previousPost,
            'nextPost' => $nextPost,
        ]);
    }

    private function publishedPostCategories()
    {
        return PostCategory::where('is_active', true)
            ->whereHas('posts', function ($query) {
                $query->where('status', 'published')->whereNotNull('published_at');
            })
            ->withCount(['posts' => function ($query) {
                $query->where('status', 'published')->whereNotNull('published_at');
            }])
            ->orderBy('name')
            ->get();
    }

    private function publishedCategories()
    {
        return Category::where('is_active', true)
            ->whereHas('projects', function ($query) {
                $query->where('status', 'published');
            })
            ->withCount(['projects' => function ($query) {
                $query->where('status', 'published');
            }])
            ->orderBy('name')
            ->get();
    }
}
