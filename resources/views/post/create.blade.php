@extends('base')

@section('content')
<form action="{{ route('posts.store') }}" method="POST">

    @csrf

    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input
          value="{{ old('title') }}"
          type="text" class="form-control" id="title" name="title">

      @error('title')
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea id="content" class="form-control" name="content">{{ old('content') }}</textarea>

        @error('content')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select id="category" class="form-select" name="category_id">
            <option selected disabled>None</option>
            @foreach($categories as $category)
                <option
                    {{ $category->id == old('category_id') ? ' selected' : '' }}
                    value="{{ $category->id }}">{{ $category->title }}</option>
            @endforeach
        </select>
        <small>You can leave this field without changes</small>
    </div>

    <div class="mb-3">
        <label for="tags" class="form-label">Tags</label>
        <select multiple id="tags" class="form-select" name="tags[]" size="{{ count($tags) }}">
            @foreach($tags as $tag)
                <option
                    {{ (is_array(old('tags')) and in_array($tag->id, old('tags'))) ? ' selected' : '' }}
                    value="{{ $tag->id }}">{{ $tag->title }}</option>
            @endforeach
        </select>
        <small>You can leave this field without changes</small>
    </div>

    <button type="submit" class="btn btn-success">Save</button>
    <a class="btn btn-primary" href="{{ route('posts.index') }}">Back</a>

</form>
@endsection
