<?php

<<<<<<< HEAD
=======
use App\Http\Controllers\ProfileController;
>>>>>>> 2d80d6bd139d07824956b75836a66502698209b8
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
<<<<<<< HEAD
=======



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
>>>>>>> 2d80d6bd139d07824956b75836a66502698209b8
