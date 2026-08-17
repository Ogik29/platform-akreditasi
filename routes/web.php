<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminProjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProjectController::class, 'index']);
Route::get('/api/projects', [ProjectController::class, 'apiIndex']);

// Admin Auth Routes (Public)
Route::post('/api/admin/login', [AdminAuthController::class, 'login']);

// Admin Protected Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/api/admin/logout', [AdminAuthController::class, 'logout']);
    Route::get('/api/admin/me', [AdminAuthController::class, 'me']);

    Route::get('/api/admin/projects', [AdminProjectController::class, 'index']);
    Route::post('/api/admin/projects', [AdminProjectController::class, 'store']);
    Route::get('/api/admin/projects/{id}', [AdminProjectController::class, 'show']);
    Route::post('/api/admin/projects/{id}', [AdminProjectController::class, 'update']);
    Route::delete('/api/admin/projects/{id}', [AdminProjectController::class, 'destroy']);
});
