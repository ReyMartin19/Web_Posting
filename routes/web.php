<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisteredController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

Route::get('/', function () {
    $post = Post::all();
    return view('index', ['posts' => $post]);
});

//post
Route::get('/post', [PostController::class, 'index'])
    ->middleware('auth');
Route::get('/post/create', [PostController::class, 'create'])
    ->middleware('auth');
Route::post('/post/store', [PostController::class, 'store'])
    ->middleware('auth');
Route::get('/post/{post}', [PostController::class, 'show']) 
    ->middleware('auth');
Route::get('/post/{post}/edit', [PostController::class, 'edit'])
    ->middleware('auth')
    ->can('update', 'post');
Route::put('/post/{post}', [PostController::class, 'update'])
    ->middleware('auth');
Route::delete('/post/{post}', [PostController::class, 'destroy'])
    ->middleware('auth')
    ->can('delete', 'post');

// comments
Route::post('/post/{post}/comment', [CommentController::class, 'store']);

// auth
Route::get('/login', [SessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy'])->name('logout');

Route::get('/register', [RegisteredController::class, 'create'])->middleware("guest")->name('register');
Route::post('/register', [RegisteredController::class, 'store']);