@extends('base')

@section('content')
    <div>{{ $post->id }}. {{ $post->title }}</div>
    <div>{{ $post->content }}</div>
    <div>Category: {{ $category->title }}</div>
    <div>
        <h3>Tags:</h3>
        <ul>
            @foreach($tags as $tag)
                <li>{{ $tag->title }}</li>
            @endforeach
        </ul>
    </div>

    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
    <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('posts.index') }}" class="btn btn-primary">Back</a>

@endsection
