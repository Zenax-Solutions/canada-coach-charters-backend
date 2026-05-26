<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $posts = BlogPost::with('category')
            ->where('status', 'published')
            ->when($request->category, fn($q) => $q->whereHas('category', fn($q2) => $q2->where('slug', $request->category)))
            ->latest('published_at')
            ->paginate($request->per_page ?? 10);

        return response()->json($posts);
    }

    public function show(string $slug)
    {
        $post = BlogPost::with('category')
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        return response()->json($post);
    }

    public function categories()
    {
        return response()->json(BlogCategory::withCount('posts')->get());
    }
}
