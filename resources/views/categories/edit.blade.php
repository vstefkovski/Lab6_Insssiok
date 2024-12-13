@extends('layouts.app')

@section('content')
    <h1>Edit Category</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf @method('PUT')
        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', $category->name) }}">
            @error('name')
            <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Update</button>
    </form>
@endsection
