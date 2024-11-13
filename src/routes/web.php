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
    return view('index');
})->name('index');
Route::get('/index/tea', function () {
    return view('tea');
})->name('index.tea');
Route::get('/index/nosotros', function () {
    return view('nosotros');
})->name('index.nosotros');
Route::get('/index/login', function () {
    return view('auth.login');
})->name('index.login');

Route::get('/contador', [ContadorController::class, 'index'])->name('contador');
Route::get('/contador/incrementar/{número}', [ContadorController::class, 'incrementar'])->name('incrementar');
Route::get('/contador/decrementar/{número}', [ContadorController::class, 'decrementar'])->name('decrementar');
Route::resource('patients', PatientController::class)->middleware('auth');
Route::resource('activities', ActivityController::class)->middleware('auth');
Route::resource('patient-activities', PatientActivityController::class);


Route::middleware('permission:see-panel')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/pull-events', [EventController::class, 'pullEvents'])->name('pull-events');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

});
