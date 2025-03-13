<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CollegeController;
use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\UnitController;
use App\Http\Controllers\API\PastPaperController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public routes
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

// Public data endpoints
Route::get('/colleges', [CollegeController::class, 'index']);
Route::get('/courses', [CourseController::class, 'index']);
Route::get('/units', [UnitController::class, 'index']);
Route::get('/courses/{course}/units/{year}', [UnitController::class, 'getUnitsByCourseAndYear']);
Route::get('/papers', [PastPaperController::class, 'index']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::get('/auth/user', [AuthController::class, 'user']);
});
