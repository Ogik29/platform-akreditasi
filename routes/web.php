<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\LookupController;

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
Route::get('/api/options', [LookupController::class, 'options']);

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

    // Admin Lookup Master Data Routes
    Route::get('/api/admin/supervisors', [\App\Http\Controllers\LookupManagementController::class, 'indexSupervisors']);
    Route::post('/api/admin/supervisors', [\App\Http\Controllers\LookupManagementController::class, 'storeSupervisor']);
    Route::put('/api/admin/supervisors/{id}', [\App\Http\Controllers\LookupManagementController::class, 'updateSupervisor']);
    Route::delete('/api/admin/supervisors/{id}', [\App\Http\Controllers\LookupManagementController::class, 'destroySupervisor']);

    Route::get('/api/admin/project-types', [\App\Http\Controllers\LookupManagementController::class, 'indexProjectTypes']);
    Route::post('/api/admin/project-types', [\App\Http\Controllers\LookupManagementController::class, 'storeProjectType']);
    Route::put('/api/admin/project-types/{id}', [\App\Http\Controllers\LookupManagementController::class, 'updateProjectType']);
    Route::delete('/api/admin/project-types/{id}', [\App\Http\Controllers\LookupManagementController::class, 'destroyProjectType']);

    Route::get('/api/admin/tech-fields', [\App\Http\Controllers\LookupManagementController::class, 'indexTechFields']);
    Route::post('/api/admin/tech-fields', [\App\Http\Controllers\LookupManagementController::class, 'storeTechField']);
    Route::put('/api/admin/tech-fields/{id}', [\App\Http\Controllers\LookupManagementController::class, 'updateTechField']);
    Route::delete('/api/admin/tech-fields/{id}', [\App\Http\Controllers\LookupManagementController::class, 'destroyTechField']);
});
