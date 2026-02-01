<?php
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('users', UserController::class);