@extends('layouts.app')

@section('content')
    <h1>{{ $category->name }} ({{ $category->slug }})</h1>
    <p>Created at: {{ $category->created_at }}</p>
    <p>Updated at: {{ $category->updated_at }}</p>

    <h2>Blog Posts in this category</h2>
    @if($category->blogPosts->count())
        <table>
            <thead>
            <tr><th>ID</th><th>Title</th><th>Slug</th></tr>
            </thead>
            <tbody>
            @foreach($category->blogPosts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td><a href="{{ route('blog-posts.show', $post->id) }}">{{ $post->title }}</a></td>
                    <td>{{ $post->slug }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>No posts in this category.</p>
    @endif
@endsection
