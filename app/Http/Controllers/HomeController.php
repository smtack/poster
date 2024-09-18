<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $following = auth()->user()->following()->pluck('user_id');

        $posts = Post::query()
                    ->whereIn('user_id', $following)
                    ->orWhere('user_id', auth()->user()->id)
                    ->latest()
                    ->paginate(10);

        return view('home', ['posts' => $posts]);
    }
}
