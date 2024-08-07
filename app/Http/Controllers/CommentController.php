<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, string $id)
    {
        $validated = $request->validate([
            'comment' => 'required|min:2|max:500'
        ]);

        $post = Post::findOrFail($id);

        $post->comments()->create([
            'user_id' => request()->user()->id,
            'comment' => $validated['comment']
        ]);

        return back();
    }

    public function destroy(string $id)
    {
        $comment = Comment::findOrFail($id);

        if($comment->user_id !== request()->user()->id) {
            abort(403);
        }

        $comment->delete();

        return back();
    }
}
