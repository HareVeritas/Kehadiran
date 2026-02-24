<?php
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\admin\PklplacingController;
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('users', UserController::class);
Route::resource('pklplacings', PklplacingController::class);
