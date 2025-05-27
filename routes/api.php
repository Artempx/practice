<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController; 

Route::get('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);
