<?php

use App\Http\Controllers\RegisterController; 

Route::post('/register', [RegisterController::class, 'register']);

