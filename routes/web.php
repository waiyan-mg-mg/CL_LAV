<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'create'])->name('home');
Route::post('/createpost', [PostController::class, 'createpost'])->name('post#create');
Route::get('/delete/{id}', [PostController::class, 'deletePost'])->name('post#delete');
Route::get('/read/{id}', [PostController::class, 'readPost'])->name('post#read');