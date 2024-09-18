<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::withCount('followers')->orderBy('followers_count', 'DESC')->paginate(10);

        return view('users', compact('users'));
    }

    public function profile(string $profile)
    {
        if(!$profile = User::where('username', $profile)->first()) {
            abort(404);
        }

        view()->share('title', "{$profile->name}'s Profile");

        $posts = Post::where('user_id', $profile->id)->latest()->paginate(10);

        return view('profile', compact('profile', 'posts'));
    }

    public function follow(User $user)
    {
        $follower = auth()->user();

        $follower->following()->attach($user);

        return back();
    }

    public function unfollow(User $user)
    {
        $follower = auth()->user();

        $follower->following()->detach($user);

        return back();
    }
}
