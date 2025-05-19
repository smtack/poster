<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::withCount('followers')->orderBy('followers_count', 'DESC')->paginate(10);

        return view('users.index', compact('users'));
    }

    public function follow(User $user)
    {
        $follower = Auth::user();

        $follower->following()->attach($user);

        return back();
    }

    public function unfollow(User $user)
    {
        $follower = Auth::user();

        $follower->following()->detach($user);

        return back();
    }
}
