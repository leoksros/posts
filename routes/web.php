<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;



Route::get('/', function () {
    return redirect()->route('posts.index');
});

Route::get('/home', function() {
    return redirect()->route('posts.index');
});

Auth::routes();

/* POSTS */

Route::resource('posts', PostController::class);

/* CATEGORIES */

Route::resource('categories', CategoryController::class);


