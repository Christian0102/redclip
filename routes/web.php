<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentController;


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


Route::get('/', [PostsController::class, 'index'])->name('posts.index');
Route::get('/post/create', [PostsController::class, 'create'])->name('post.create');
Route::post('/post/create', [PostsController::class, 'store'])->name('post.store');
Route::get('/post/show/{id}', [PostsController::class, 'show'])->name('post.show');
Route::patch('/post/vote', [PostsController::class, 'vote'])->name('post.vote');

Route::post('/comment/create', [CommentController::class, 'store'])->name('comment.store');
Route::patch('/comment/vote', [CommentController::class, 'vote'])->name('comment.vote');
