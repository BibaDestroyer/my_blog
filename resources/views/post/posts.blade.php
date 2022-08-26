@extends('base')

@section('content')

    <h1>This is blog page!</h1>
    <a class="btn btn-primary mb-3" href="{{ route('posts.create') }}">Create Post</a>
    <ul>
        @foreach ($posts as $post)
            <li><a href={{ route('posts.show', $post->id) }}>{{ $post->id }}. {{ $post->title }}</a></li>
        @endforeach
    </ul>
    
@endsection