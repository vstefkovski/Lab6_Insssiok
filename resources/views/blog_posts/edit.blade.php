@extends('layouts.app')

@section('content')
    <h1>Edit Blog Post</h1>
    <form action="{{ route('blog-posts.update', $blogPost->id) }}" method="POST">
        @csrf @method('PUT')
        <div>
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title', $blogPost->title) }}">
            @error('title')
            <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label>Description</label>
            <textarea name="description">{{ old('description', $blogPost->description) }}</textarea>
            @error('description')
            <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label>Category</label>
            <select name="category_id">
                <option value="">--Select--</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id', $blogPost->category_id) == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
            <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
