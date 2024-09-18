<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::withCount('likes')->orderBy('likes_count', 'DESC')->paginate(10);

        return view('posts', ['posts' => $posts]);
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

        return view('post', compact('post', 'comments'));
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

        return view('edit', ['post' => $post]);
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

    public function search(Request $request)
    {
        $query = $request->input('q');

        $results = Post::where('post', 'LIKE', "%$query%")->latest()->paginate(10)->withQueryString();

        view()->share('title', 'Search - ' . $query);

        return view('search', compact('query', 'results'));
    }

    public function like(Post $post)
    {
        auth()->user()->likes()->attach($post);

        return redirect()->back();
    }

    public function unlike(Post $post)
    {
        auth()->user()->likes()->detach($post);

        return redirect()->back();
    }
}
