<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;

Route::resource('products', ProductController::class)->except(['show']);
Route::get('transactions', [TransactionController::class,'index'])->name('transactions.index');
Route::post('transactions', [TransactionController::class,'store'])->name('transactions.store');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');




