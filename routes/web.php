<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/blog', [PostController::class, 'getPost'])->name('blog');
Route::get('/detail-blog/{slug}', [PostController::class, 'getPostBySlug'])->name('detail.blog');


