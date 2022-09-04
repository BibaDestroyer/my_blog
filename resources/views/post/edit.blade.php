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

    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select id="category" class="form-select" name="category_id">
            @foreach($categories as $category)
                <option
                    {{ $post->category_id === $category->id ? ' selected' : '' }}
                    value="{{ $category->id }}">{{ $category->title }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="tag" class="form-label">Tags</label>
        <select multiple id="tag" class="form-select" name="tags[]">
            @foreach($tags as $tag)
                <option
                    @foreach($post->tags as $postTag)
                        {{ $postTag->id === $tag->id ? ' selected' : '' }}
                    @endforeach
                    value="{{ $tag->id }}">{{ $tag->title }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
    <a class="btn btn-primary" href="{{ route('posts.index', $post->id) }}">Back</a>
  </form>
@endsection
