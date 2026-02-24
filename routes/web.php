<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
Route::get('/dashboard', function () {
        $role = Auth::user()->role;

        if ($role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($role === 'teacher') {
            return redirect()->route('teacher.dashboard');
        }

        // Default jika role tidak dikenali
        abort(403);
    })->name('dashboard');




    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        
        require __DIR__.'/admin.php';
    });

    Route::middleware('role:teacher')->prefix('teacher')->name('teacher.')->group(function () {
        require __DIR__.'/guru.php';
    });


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
