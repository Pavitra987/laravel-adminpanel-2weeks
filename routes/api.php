<?php

use App\Http\Controllers\AdminBookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\bookcontroller;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/books', [BookController::class, 'index']);

Route::get('/books/trash', [BookController::class, 'trash']);

Route::get('/books/{id}', [BookController::class, 'show']);

Route::delete('/books/{id}', [AdminBookController::class, 'destroy']);

Route::put('books/{id}',[bookcontroller::class,'update',]);

Route::post('/books',[bookcontroller::class,'storebook']);

Route::put('/books/{id}/restore', [BookController::class, 'restore']);

Route::delete('/books/{id}/force-delete', [BookController::class, 'forceDelete']);