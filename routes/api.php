<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/student/login', [AuthController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    // Route ini hanya bisa diakses jika membawa Token
    Route::get('/student/profile', [AuthController::class,'show']);
    Route::post('/student/update-profile', [AuthController::class, 'update']);
    Route::post('/student/logout', [AuthController::class, 'destroy']);
});
