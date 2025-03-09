<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminDashboardController;

// All routes should be within the web middleware group for proper session and CSRF handling
Route::middleware(['web'])->group(function () {
    // Authentication Routes
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected Routes (require authentication)
    Route::middleware(['auth'])->group(function () {
        // Dashboard
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        
        // Future routes for colleges, courses, units, and past papers will go here
    });
});
