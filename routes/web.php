<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminAuthController;

Route::get('/', [BookController::class, 'index']);

Route::get('/admin/index', [AdminBookController::class, 'index'])
    ->name('admin.index');

Route::get('/admin/addbook', [AdminBookController::class, 'addbook'])
    ->name('admin.addbook');

Route::post('/admin/storebook', [AdminBookController::class, 'storebook'])
    ->name('admin.storebook');

Route::delete('/admin/deletebook/{id}', [AdminBookController::class, 'deletebook'])
    ->name('admin.deletebook');






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/user/dashboard', function () {
    return view('user.dashboard');
})->middleware('auth')->name('user.dashboard');


Route::get('/admin', [AdminAuthController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login.submit');

    Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
    ->name('admin.logout');

    Route::get('/ajax', function () {
    return view('ajax');
});

Route::get('/books-datatable', [BookController::class, 'datatable']);
Route::get('/books-table', function () {
    return view('books-datatable');
});