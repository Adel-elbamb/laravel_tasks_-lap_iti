@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>

    <form action="{{ route('posts.update', $post['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $post['title'] }}" required>
        </div>

        <div class="form-group">
            <label for="body">Content</label>
            <textarea name="body" id="body" class="form-control" rows="5" required>{{ $post['body'] }}</textarea>
        </div>

        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ $post['author'] }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
@endsection
