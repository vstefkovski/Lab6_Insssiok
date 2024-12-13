@extends('layouts.app')

@section('content')
    <h1>Create Blog Post</h1>
    <form action="{{ route('blog-posts.store') }}" method="POST">
        @csrf
        <div>
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title') }}">
            @error('title')
            <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label>Description</label>
            <textarea name="description">{{ old('description') }}</textarea>
            @error('description')
            <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label>Category</label>
            <select name="category_id">
                <option value="">--Select--</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Create</button>
    </form>
@endsection
