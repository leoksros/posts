<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */


/* POSTS */

Route::get('/posts/create',[App\Http\Controllers\PostController::class, 'create'])->name('create.post');
Route::get('/posts',[App\Http\Controllers\PostController::class, 'index'])->name('index.posts');
Route::post('/posts',[App\Http\Controllers\PostController::class, 'store'])->name('store.post');
Route::get('/posts/{$id}',[App\Http\Controllers\PostController::class, 'show'])->name('show.post');
Route::patch('/posts/{$id}',[App\Http\Controllers\PostController::class, 'update'])->name('update.post');
Route::delete('/posts/{$id}',[App\Http\Controllers\PostController::class, 'destroy'])->name('delete.post');

/* CATEGORIES */

Route::get('/categories/create',[App\Http\Controllers\CategoryController::class, 'create'])->name('create.category');
Route::get('/categories',[App\Http\Controllers\CategoryController::class, 'index'])->name('index.categories');
Route::post('/categories',[App\Http\Controllers\CategoryController::class, 'store'])->name('store.category');
Route::get('/categories/{$id}',[App\Http\Controllers\CategoryController::class, 'show'])->name('show.categories');
Route::patch('/categories/{$id}',[App\Http\Controllers\CategoryController::class, 'update'])->name('update.categories');
Route::delete('/categories/{$id}',[App\Http\Controllers\CategoryController::class, 'destroy'])->name('destroy.categories');
