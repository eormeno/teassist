<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ContadorController;
use App\Http\Controllers\PatientActivityController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/contador', [ContadorController::class, 'index'])->name('contador');
Route::get('/contador/incrementar/{número}', [ContadorController::class, 'incrementar'])->name('incrementar');
Route::get('/contador/decrementar/{número}', [ContadorController::class, 'decrementar'])->name('decrementar');

// Dashboard y vistas protegidas por see-panel
Route::middleware(['auth', 'permission:see-panel'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/pull-events', [EventController::class, 'pullEvents'])->name('pull-events');

    Route::resource('roles', RoleController::class)->middleware('permission:roles-list');
    Route::resource('users', UserController::class)->middleware('permission:users-list');
});

// Rutas para pacientes
Route::middleware(['auth', 'permission:patients-list'])->group(function () {
    Route::resource('patients', PatientController::class);
});

// Rutas para actividades
Route::middleware(['auth', 'permission:activities-list'])->group(function () {
    Route::resource('activities', ActivityController::class);
});

// Rutas para asignación de actividades a pacientes
Route::middleware(['auth', 'permission:patient-activities-list'])->group(function () {
    Route::resource('patient-activities', PatientActivityController::class);
});

