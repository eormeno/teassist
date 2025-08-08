<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ContadorController;
use App\Http\Controllers\PatientActivityController;
use App\Http\Controllers\Auth\PatientAuthController;

// Rutas públicas
Route::get('/', function () {
    return view('landing');
})->name('landing');

// Rutas de contador 
Route::get('/contador', [ContadorController::class, 'index'])->name('contador');
Route::get('/contador/incrementar/{número}', [ContadorController::class, 'incrementar'])->name('incrementar');
Route::get('/contador/decrementar/{número}', [ContadorController::class, 'decrementar'])->name('decrementar');
Route::get('/contador/duplicar/{número}', [ContadorController::class, 'duplicar'])->name('duplicar');
Route::get('/contador/resetear', [ContadorController::class, 'resetear'])->name('resetear');
Route::post('/contador/reestablecer', [ContadorController::class, 'reestablecer'])->name('reestablecer');

// Rutas accesibles para todos los autenticados 
Route::middleware(['auth', 'permission:see-panel'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('patients', PatientController::class);
    Route::resource('activities', ActivityController::class);
    Route::resource('patient-activities', PatientActivityController::class);
    Route::get('/pull-events', [EventController::class, 'pullEvents'])->name('pull-events');
});

// Rutas solo para roles-admin
Route::middleware(['auth', 'permission:roles-list|roles-create|roles-edit|roles-delete'])->group(function () {
    Route::resource('roles', RoleController::class);
});

// Rutas solo para users-admin
Route::middleware(['auth', 'permission:users-list|users-create|users-edit|users-delete|users-disable|users-enable'])->group(function () {
    Route::resource('users', UserController::class);
});



// Mostrar formulario de login del paciente
Route::get('/patient-login', [PatientAuthController::class, 'showLoginForm'])->name('patient.login');

// Procesar login del paciente
Route::post('/patient-login', [PatientAuthController::class, 'login'])->name('patient.login.submit');


// Route::middleware(['auth', 'role:patient'])->group(function () {
//     Route::get('/patient/dashboard', function () {
//         return view('dashboard'); // O cualquier vista específica para pacientes
//     })->name('patient.dashboard');
// });
