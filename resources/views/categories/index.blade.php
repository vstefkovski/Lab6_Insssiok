@extends('layouts.app')

@section('content')
    <h1>Categories</h1>
    <form method="GET" action="{{ route('categories.index') }}">
        <input type="text" name="search" placeholder="Search by name" value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>
    <a href="{{ route('categories.create') }}">Create New Category</a>
    <table>
        <thead>
        <tr><th>ID</th><th>Name</th><th>Slug</th><th>Actions</th></tr>
        </thead>
        <tbody>
        @forelse($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a></td>
                <td>{{ $category->slug }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category->id) }}">Edit</a> |
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete category?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4">No categories found.</td></tr>
        @endforelse
        </tbody>
    </table>
    {{ $categories->links() }}
@endsection
