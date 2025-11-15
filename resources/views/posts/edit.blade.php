@extends('layouts.app')

@section('content')
<h1>Edit Post</h1>

@if($errors->any())
  <div>
    <ul>
      @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('posts.update', $post) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label>Title</label><br>
        <input type="text" name="title" value="{{ old('title', $post->title) }}" required>
    </div><br>
    <div>
        <label>Content</label><br>
        <textarea name="content" required>{{ old('content', $post->content) }}</textarea>
    </div><br>
    <button type="submit">Update</button>
</form>
@endsection
