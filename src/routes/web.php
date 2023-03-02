<?php

use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;


// Public routes
Route::as('front.')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
});

// Dashboard Routes
Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
      // General
      Route::post('editor/image/upload', [DashboardController::class, 'imageUpload'])->name('editor.file.upload');
    Route::resource('user', UserController::class);
});

require __DIR__ . '/auth.php';
