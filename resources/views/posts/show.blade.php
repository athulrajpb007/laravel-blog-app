@extends('layouts.app')

@section('content')
<article>
    <h1>{{ $post->title }}</h1>
    <p>By {{ $post->user->name }} — {{ $post->created_at->toDayDateTimeString() }}</p>
    <div>{{ $post->content }}</div>

    @auth
        @if(auth()->id() === $post->user_id)
            <a href="{{ route('posts.edit', $post) }}">Edit</a>
            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Delete?')">Delete</button>
            </form>
        @endif
    @endauth
</article>
@endsection
