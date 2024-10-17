<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');
Route::get('/specials', function () {
    return view('specials');
})->name('specials');
Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');
Route::get('/book', function () {
    return view('book');
})->name('book');
Route::get('/events', function () {
    return view('events');
})->name('events');
Route::get('/shop', function () {
    return view('shop');
})->name('shop');
Route::get('/blog', function () {
    return view('blog');
})->name('blog');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');
