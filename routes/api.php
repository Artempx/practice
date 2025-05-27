<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController; 
use App\Http\Controllers\AddNoteController; 
use App\Http\Controllers\DeleteNoteController; 
use App\Http\Controllers\EditNoteController; 

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/addNote', [AddNoteController::class, 'addNote']);
Route::delete('/delete', [DeleteNoteController::class, 'deleteNote']);
Route::patch('/editNote', [EditNoteController::class, 'editNote']);