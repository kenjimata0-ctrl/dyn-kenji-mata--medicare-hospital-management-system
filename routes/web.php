
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ConsultationController;

// Guest routes - users who are not logged in
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->middleware('throttle:login')
        ->name('login.submit');

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.submit');
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])
        ->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    // Patients Management Routes
    Route::resource('patients', PatientController::class);

    // Doctors Management Routes
    Route::resource('doctors', DoctorController::class);

    // Appointments Management Routes
    Route::resource('appointments', AppointmentController::class);

    // Consultations Management Routes
    Route::resource('consultations', ConsultationController::class);
});

// Homepage
Route::get('/', function () {
    return redirect()->route('login');
});
