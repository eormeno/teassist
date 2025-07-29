<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ContadorController;
use App\Http\Controllers\PatientAuthController;
use App\Http\Controllers\PatientActivityController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('/contador', [ContadorController::class, 'index'])->name('contador');
Route::get('/contador/incrementar/{número}', [ContadorController::class, 'incrementar'])->name('incrementar');
Route::get('/contador/decrementar/{número}', [ContadorController::class, 'decrementar'])->name('decrementar');

// Dashboard y eventos (ver panel)
Route::middleware(['auth', 'permission:see-panel'])->group(function () {
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
    Route::get('/pull-events', [EventController::class, 'pullEvents'])->name('pull-events');
});

// Roles
Route::middleware(['auth', 'permission:roles-list'])->group(function () {
    Route::resource('roles', RoleController::class);
});

// Usuarios
Route::middleware(['auth', 'permission:users-list'])->group(function () {
    Route::resource('users', UserController::class);
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
// Autenticación de paciente
Route::get('/patient-login', [PatientAuthController::class, 'showLoginForm'])->name('patient.login');
Route::post('/patient-login', [PatientAuthController::class, 'login']);
Route::post('/patient-logout', [PatientAuthController::class, 'logout'])->name('patient.logout');

// Ruta protegida para el dashboard de pacientes
Route::middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/patient/dashboard', [PatientAuthController::class, 'index'])->name('patient.dashboard');
});

Route::middleware('auth')->post('/patient-activity/{id}/complete', [PatientActivityController::class, 'markAsCompleted'])
    ->name('patient.activity.markAsCompleted');

Route::middleware('auth', )->post('/patient/mood', [PatientAuthController::class, 'storeMood'])->name('patient.mood.store');

