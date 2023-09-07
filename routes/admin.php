<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\StyleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest:admin')->group(function () {

    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'store'])->name('login.store');
});


Route::middleware('auth:admin')->group(function () {

    Route::resource('books', BookController::class);
    Route::resource('styles', StyleController::class);
    Route::resource('users', UserController::class);
});
