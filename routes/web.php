<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [WelcomeController::class, 'index']);

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('users', [UserController::class, 'users'])->name('users');
    Route::get('news', [PostController::class, 'news'])->name('news');
    Route::get('popular', [PostController::class, 'popular'])->name('popular');
    Route::resource('posts', PostController::class);
    Route::resource('profile', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::get('category/{id}', [CategoryController::class, 'showPostsByCategory'])->name('byCategory');
    Route::resource('grade', GroupController::class);
    Route::resource('profile', UserController::class);
    Route::resource('comment', CommentController::class);
    Route::resource('like', LikeController::class);
});