<?php

use Illuminate\Support\Facades\Route;

Route::get('lang/{lang}', function ($lang) {
    app()->setLocale($lang);

    session()->put('locale', $lang);

    return redirect()->back();
})->name('lang');
