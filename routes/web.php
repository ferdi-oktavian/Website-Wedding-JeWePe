<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\OrderController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/orders/create',  [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders',        [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/success', [OrderController::class, 'success'])->name('orders.success');

