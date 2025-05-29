<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController; 
use App\Http\Controllers\AddNoteController; 
use App\Http\Controllers\DeleteNoteController; 
use App\Http\Controllers\EditNoteController; 
use App\Http\Controllers\GetNoteController; 
use App\Http\Controllers\SyncController;

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/addNote', [AddNoteController::class, 'addNote']);
Route::delete('/delete', [DeleteNoteController::class, 'deleteNote']);
Route::patch('/editNote', [EditNoteController::class, 'editNote']);
Route::get('/note', [GetNoteController::class,'getnote']);
Route::get('/note/{id}/export', [ExportNoteController::class, 'export']);
Route::post('/import', [ImportNoteController::class, 'import']);