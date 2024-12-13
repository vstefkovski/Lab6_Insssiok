@extends('layouts.app')

@section('content')
    <h1>Blog Posts</h1>

    <form method="GET" action="{{ route('blog-posts.index') }}">
        <select name="category_id">
            <option value="">-- Filter by Category --</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
            @endforeach
        </select>
        <button type="submit">Filter</button>
        <a href="{{ route('blog-posts.index') }}">Clear Filter</a>
    </form>

    <a href="{{ route('blog-posts.create') }}">Create New Post</a>

    <table>
        <thead>
        <tr><th>ID</th><th>Title</th><th>Category</th><th>Actions</th></tr>
        </thead>
        <tbody>
        @forelse($blogPosts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td><a href="{{ route('blog-posts.show', $post->id) }}">{{ $post->title }}</a></td>
                <td>{{ $post->category->name }}</td>
                <td>
                    <a href="{{ route('blog-posts.edit', $post->id) }}">Edit</a> |
                    <form action="{{ route('blog-posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete post?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4">No blog posts found.</td></tr>
        @endforelse
        </tbody>
    </table>
    {{ $blogPosts->links() }}
@endsection
