<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'categoryCount' => Category::count(),
            'projectCount' => Project::count(),
            'postCount' => Post::count(),
            'recentProjects' => Project::with('category')->latest()->take(5)->get(),
        ]);
    }
}
