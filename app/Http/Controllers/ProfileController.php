<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\Rules\File as FileRule;

class ProfileController extends Controller
{
    /**
     * Display the users profile page
     */
    public function index(string $profile)
    {
        if(!$profile = User::where('username', $profile)->first()) {
            abort(404);
        }

        view()->share('title', "{$profile->name}'s Profile");

        $posts = Post::where('user_id', $profile->id)->latest()->paginate(10);

        return view('profile.index', compact('profile', 'posts'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        view()->share('title', "Account Settings");

        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function updateAvatar(Request $request)
    {
        $request->validate([
            'avatar' => ['required', FileRule::types(['png', 'jpg', 'webp'])]
        ]);

        $request->avatar->store('public/avatars');

        $filename = $request->avatar->hashName();

        if(Auth::user()->avatar !== 'default.webp') {
            $path = 'storage/avatars/' . Auth::user()->avatar;

            if(File::exists($path)) {
                File::delete($path);
            }
        }

        $request->user()->update([
            'avatar' => $filename
        ]);

        return Redirect::route('profile.edit')->with('status', 'avatar-updated');
    }

    public function updateBio(Request $request)
    {
        $validated = $request->validate([
            'bio' => 'required|min:3|max:1000'
        ]);

        $request->user()->update($validated);

        return Redirect::route('profile.edit')->with('status', 'bio-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
