<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'create']);
Route::post('/createpost', [PostController::class, 'createpost'])->name('post#create');
