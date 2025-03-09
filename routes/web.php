<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CollegeController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\PastPaperController;
use App\Http\Controllers\Admin\UserController;

// Guest Routes
Route::middleware('guest')->group(function () {
    // Redirect root to login for streamlined authentication
    Route::get('/', function () {
        return redirect('/login');
    });

    // Authentication Routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// Admin Routes (authenticated)
Route::prefix('admin')->middleware('auth')->group(function () {
    // Dashboard as the main landing page
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    // Resource Routes for CRUD operations
    Route::resource('colleges', CollegeController::class)->names('admin.colleges');
    Route::resource('courses', CourseController::class)->names('admin.courses');
    Route::resource('units', UnitController::class)->names('admin.units');
    Route::resource('papers', PastPaperController::class)->names('admin.papers');
    Route::get('papers/{paper}/download', [PastPaperController::class, 'download'])->name('admin.papers.download');
    Route::resource('users', UserController::class)->names('admin.users');
    
    // Logout Route (inside admin group to use admin prefix)
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
});

// Fallback logout route for compatibility
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
