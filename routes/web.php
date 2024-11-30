<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

// Rutas públicas
Route::get('/', [OrderController::class, 'home'])->name('home');

// Rutas protegidas
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('orders', OrderController::class);
});

Route::get('/', function () {
    return view('welcome');
});
