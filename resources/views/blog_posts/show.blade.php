@extends('layouts.app')

@section('content')
    <h1>{{ $blogPost->title }}</h1>
    <p><strong>Category:</strong> {{ $blogPost->category->name }}</p>
    <p><strong>Slug:</strong> {{ $blogPost->slug }}</p>
    <p><strong>Description:</strong> {{ $blogPost->description }}</p>
    <p>Created at: {{ $blogPost->created_at }}</p>
    <p>Updated at: {{ $blogPost->updated_at }}</p>
@endsection
