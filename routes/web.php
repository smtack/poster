<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [PostController::class, 'index'])->name('home');
    Route::post('/create', [PostController::class, 'store'])->name('create');
    Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [PostController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [PostController::class, 'destroy'])->name('delete');

    Route::get('search', [PostController::class, 'search'])->name('search');
    Route::get('explore', [PostController::class, 'explore'])->name('explore');

    Route::post('comment/{id}', [CommentController::class, 'store'])->name('comment');
    Route::delete('delete-comment/{id}', [CommentController::class, 'destroy'])->name('delete-comment');

    Route::get('/post/{id}', [PostController::class, 'show'])->name('post');

    Route::get('/profile/{profile}', [UserController::class, 'profile'])->name('profile');
    Route::post('/follow/{user}', [UserController::class, 'follow'])->name('follow');
    Route::post('/unfollow/{user}', [UserController::class, 'unfollow'])->name('unfollow');
});

Route::middleware('auth')->group(function () {
    Route::get('/account', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
