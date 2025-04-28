@extends('layouts.app')

@section('content')
    <h1>Create New Post</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="body">Content</label>
            <textarea name="body" id="body" class="form-control" rows="5" required></textarea>
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" id="author" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
@endsection
