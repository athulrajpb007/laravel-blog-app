@extends('layouts.app')

@section('content')
<h1>Create Post</h1>

@if($errors->any())
  <div>
    <ul>
      @foreach($errors->all() as $e) <li>{{ $e }}</li> @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('posts.store') }}" method="POST">
    @csrf
    <div>
        <label>Title</label><br>
        <input type="text" name="title" value="{{ old('title') }}" required>
    </div><br>
    <div>
        <label>Content</label><br>
        <textarea name="content" required>{{ old('content') }}</textarea>
    </div>
    <button type="submit">Save</button>
</form>
@endsection
