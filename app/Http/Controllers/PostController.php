<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::withCount('likes')->orderBy('likes_count', 'DESC')->paginate(10);

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'post' => 'required|string|min:2|max:1000'
        ]);

        $request->user()->posts()->create($validated);

        return redirect('/home');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);

        $comments = Comment::where('post_id', $post->id)->latest()->get();

        return view('posts.show', compact('post', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);

        if($post->user_id !== request()->user()->id) {
            abort(403);
        }

        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        if($post->user_id !== request()->user()->id) {
            abort(403);
        }

        $validated = $request->validate([
            'post' => 'required|string|min:2|max:1000'
        ]);

        $post->update($validated);

        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        if($post->user_id !== request()->user()->id) {
            abort(403);
        }

        $post->delete();

        return redirect('/home');
    }

    public function like(Post $post)
    {
        Auth::user()->likes()->attach($post);

        return redirect()->back();
    }

    public function unlike(Post $post)
    {
        Auth::user()->likes()->detach($post);

        return redirect()->back();
    }
}
