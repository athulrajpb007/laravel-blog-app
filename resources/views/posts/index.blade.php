@extends('layouts.app')

@section('content')
<h1>All Posts</h1>

@foreach($posts as $post)
    <article style="border:1px solid #ddd;padding:10px;margin:10px 0;">
        <h2><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h2>
        <p>By {{ $post->user->name }} — {{ $post->created_at->diffForHumans() }}</p>
        <p>{{ Str::limit($post->content, 200) }}</p>

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
@endforeach

{{ $posts->links() }}
@endsection
