<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisteredController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/post', [PostController::class, 'index']);
Route::get('/post/create', [PostController::class, 'create']);
Route::post('/post/store', [PostController::class, 'store']);
Route::get('/post/{post}', [PostController::class, 'show']);
Route::get('/post/{post}/edit', [PostController::class, 'edit']);
Route::put('/post/{post}', [PostController::class, 'update']);
Route::delete('/post/{post}', [PostController::class, 'destroy']);

Route::post('/post/{post}/comment', [CommentController::class, 'store']);

//auth
Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::get('/register', [RegisteredController::class, 'create']);
Route::post('/register', [RegisteredController::class, 'store']);