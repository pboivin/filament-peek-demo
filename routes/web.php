<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::redirect('/login', '/admin/login')->name('login');

Route::group(['prefix' => 'blog'], function () {
    Route::get('/', [PostController::class, 'index'])->name('post.index');
    Route::get('/{slug}', [PostController::class, 'show'])->name('post.show');
});

Route::get('/', [PageController::class, 'home'])->name('page.home');

Route::get('/contact', [PageController::class, 'contact'])->name('page.contact');

Route::get('/{slug}', [PageController::class, 'show'])->name('page.show');
