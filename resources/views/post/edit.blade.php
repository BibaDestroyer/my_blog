@extends('base')

@section('content')
<form action="{{ route('posts.update', $post->id) }}" method="POST">

    @method('patch')
    @csrf

    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" id="title" value="{{ $post->title }}" name="title">
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea id="content" class="form-control" name="content">{{ $post->content}}</textarea>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
    <a class="btn btn-primary" href="{{ route('posts.index', $post->id) }}">Back</a>
  </form>
@endsection