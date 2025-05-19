<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __invoke()
    {
        $following = Auth::user()->following()->pluck('user_id');

        $posts = Post::query()
                    ->whereIn('user_id', $following)
                    ->orWhere('user_id', Auth::user()->id)
                    ->latest()
                    ->paginate(10);

        return view('home', ['posts' => $posts]);
    }
}
