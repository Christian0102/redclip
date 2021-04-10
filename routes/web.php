<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

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
Route::get('/post/create', [PostsController::class, 'create'])->name('posts.create');
Route::post('/post/create', [PostsController::class, 'store'])->name('posts.store');
