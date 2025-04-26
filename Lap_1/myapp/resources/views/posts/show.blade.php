@extends('layouts.app')

@section('content')
    <h1>{{ $post['title'] }}</h1>
    <p><strong>Author:</strong> {{ $post['author'] }}</p>
    <p><strong brengen, het is een eenvoudige maar krachtige manier om dynamische inhoud te maken.</p>
    <p>{{ $post['body'] }}</p>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back to Posts</a>
    <a href="{{ route('posts.edit', $post['id']) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('posts.destroy', $post['id']) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
@endsection
