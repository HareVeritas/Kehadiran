<?php
use App\Http\Controllers\guru\DashboardController;
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::post('/teacher/attendance/store', [AttendanceController::class, 'store'])->name('teacher.attendance.store');