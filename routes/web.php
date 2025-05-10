<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', HomeController::class)->name('home');

    Route::post('/create', [PostController::class, 'store'])->name('create');
    Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [PostController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [PostController::class, 'destroy'])->name('delete');

    Route::post('comment/{id}', [CommentController::class, 'store'])->name('comment');
    Route::get('/edit-comment/{id}', [CommentController::class, 'edit'])->name('edit-comment');
    Route::patch('/update-comment/{id}', [CommentController::class, 'update'])->name('update-comment');
    Route::delete('delete-comment/{id}', [CommentController::class, 'destroy'])->name('delete-comment');

    Route::get('search', [PostController::class, 'search'])->name('search');
    Route::get('posts', [PostController::class, 'index'])->name('posts');
    Route::get('users', [UserController::class, 'index'])->name('users');

    Route::get('/post/{id}', [PostController::class, 'show'])->name('post');

    Route::get('/profile/{profile}', [UserController::class, 'profile'])->name('profile');

    Route::post('users/{user}/follow', [UserController::class, 'follow'])->name('users.follow');
    Route::post('users/{user}/unfollow', [UserController::class, 'unfollow'])->name('users.unfollow');

    Route::post('posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
    Route::post('posts/{post}/unlike', [PostController::class, 'unlike'])->name('posts.unlike');
});

Route::middleware('auth')->group(function () {
    Route::get('/account', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar');
    Route::patch('/bio', [ProfileController::class, 'updateBio'])->name('profile.bio');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
