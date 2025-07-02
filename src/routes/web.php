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
use App\Http\Controllers\PatientDashboardController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

// Ruta para iniciar sesión
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/contador', [ContadorController::class, 'index'])->name('contador');
Route::get('/contador/incrementar/{número}', [ContadorController::class, 'incrementar'])->name('incrementar');
Route::get('/contador/decrementar/{número}', [ContadorController::class, 'decrementar'])->name('decrementar');

// Recursos protegidos por rol
Route::resource('patients', PatientController::class)->middleware(['auth', 'role:therapist']);
Route::resource('activities', ActivityController::class)->middleware('auth');
Route::resource('patient-activities', PatientActivityController::class)->middleware(['auth']);

// Panel administrativo
Route::middleware('permission:see-panel')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/pull-events', [EventController::class, 'pullEvents'])->name('pull-events');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

// Autenticación de paciente
Route::get('/patient-login', [PatientAuthController::class, 'showLoginForm'])->name('patient.login');
Route::post('/patient-login', [PatientAuthController::class, 'login']);
Route::post('/patient-logout', [PatientAuthController::class, 'logout'])->name('patient.logout');

// Grupo para rutas de pacientes autenticados con rol
Route::middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/patient/dashboard', [PatientController::class, 'dashboard'])->name('patient.dashboard');
    
});

// Ruta para guardar el estado de ánimo (puede ser general para paciente logueado)
Route::middleware('auth')->post('/patient/mood', [PatientController::class, 'storeMood'])->name('patient.mood.store');

Route::middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/mis-actividades', [PatientActivityController::class, 'myActivities'])->name('patients.activities');
});

Route::middleware(['auth', 'role:patient'])->group(function () {
    Route::post('/patient/logout', [PatientController::class, 'logout'])->name('patient.logout');
});
Route::patch('/patient/activity/{activity}/toggle', [PatientController::class, 'toggleActivity'])->name('patient.activity.toggle');