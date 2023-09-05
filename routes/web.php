<?php

use App\Http\Controllers\CustomersController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::post('/getInfo', [CustomersController::class, 'register']);
