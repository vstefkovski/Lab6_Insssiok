<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index(Request $request)
    {
        $query = BlogPost::with('category');
        if ($request->has('category_id') && !empty($request->category_id)) {
            $query->where('category_id', $request->category_id);
        }
        $blogPosts = $query->orderBy('created_at', 'desc')->paginate(10);
        $categories = Category::all();
        return view('blog_posts.index', compact('blogPosts', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('blog_posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'required|min:50',
            'category_id' => 'required|exists:categories,id',
        ]);

        BlogPost::create($request->only('title', 'description', 'category_id'));
        return redirect()->route('blog-posts.index')->with('success', 'Blog post created successfully!');
    }

    public function show($id)
    {
        $blogPost = BlogPost::with('category')->findOrFail($id);
        return view('blog_posts.show', compact('blogPost'));
    }

    public function edit($id)
    {
        $blogPost = BlogPost::findOrFail($id);
        $categories = Category::all();
        return view('blog_posts.edit', compact('blogPost', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'required|min:50',
            'category_id' => 'required|exists:categories,id',
        ]);

        $blogPost = BlogPost::findOrFail($id);
        $blogPost->update($request->only('title', 'description', 'category_id'));
        return redirect()->route('blog-posts.index')->with('success', 'Blog post updated successfully!');
    }

    public function destroy($id)
    {
        $blogPost = BlogPost::findOrFail($id);
        $blogPost->delete();
        return redirect()->route('blog-posts.index')->with('success', 'Blog post deleted successfully!');
    }
}
