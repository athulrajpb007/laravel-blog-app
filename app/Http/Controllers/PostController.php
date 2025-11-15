<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|min:3',
            'content' => 'required|string',
        ]);

        $data['user_id'] = Auth::id();

        Post::create($data);

        return redirect()->route('posts.index')->with('success', 'Post created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->load('user');
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->authorizeAction($post);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorizeAction($post);

        $data = $request->validate([
            'title' => 'required|string|min:3',
            'content' => 'required|string',
        ]);

        $post->update($data);

        return redirect()->route('posts.index')->with('success', 'Post updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorizeAction($post);
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted.');
    }

    // helper to ensure current user is the author
    protected function authorizeAction(Post $post)
    {
        if (Auth::id() !== $post->user_id) {
            abort(403, 'Unauthorized action.');
        }
    }

    // API method to get all posts with authors
    // public function apiIndex()
    // {
    //     return Post::with('user')->orderBy('created_at', 'desc')->get();
    // }

    public function apiIndex()
    {
        $posts = \App\Models\Post::with('user')->orderBy('created_at', 'desc')->get();
        return response()->json($posts);
    }
}
