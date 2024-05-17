<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasswordGeneratorController;
use App\Http\Controllers\PizzaOrderController;

// Landing Page Route
Route::get('/', function () {
    return view('welcome');
});

// Password Generator Routes
Route::get('/password-generator', [PasswordGeneratorController::class, 'index'])->name('password-generator');
Route::post('/generate-password', [PasswordGeneratorController::class, 'generate'])->name('generate-password');

// Pizza Order Routes
Route::get('/pizza-order', [PizzaOrderController::class, 'index'])->name('pizza-order');
Route::post('/calculate-bill', [PizzaOrderController::class, 'calculate'])->name('calculate-bill');