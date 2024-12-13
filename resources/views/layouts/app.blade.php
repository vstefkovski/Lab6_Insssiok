<!DOCTYPE html>
<html>
<head>
    <title>Blog App</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<nav>
    <a href="{{ route('categories.index') }}">Categories</a> |
    <a href="{{ route('blog-posts.index') }}">Blog Posts</a>
</nav>
<hr>
@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif
@yield('content')
</body>
</html>
