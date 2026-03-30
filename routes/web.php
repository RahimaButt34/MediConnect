<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController; // YE LINE MISSING THI

// Home Page
Route::get('/', function () {
    return redirect('/login');
});

// --- AUTH ROUTES ---
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// --- PROTECTED ROUTES (Auth Middleware) ---
Route::middleware('auth')->group(function () {

    // Dashboards
    Route::get('/admin/dashboard', function () {
        return view('admin_dashboard');
    })->name('admin.dashboard');

    Route::get('/patient/dashboard', function () {
        return view('patient_dashboard');
    })->name('patient.dashboard');

    // --- DOCTORS CRUD (Admin Only) ---
    Route::get('/admin/doctors', [DoctorController::class, 'index'])->name('admin.doctors');
    Route::post('/admin/doctors/store', [DoctorController::class, 'store']);
    Route::get('/admin/doctors/edit/{id}', [DoctorController::class, 'edit']);
    Route::post('/admin/doctors/update/{id}', [DoctorController::class, 'update']);
    Route::get('/admin/doctors/delete/{id}', [DoctorController::class, 'destroy']);

    // --- APPOINTMENTS MANAGEMENT ---
    Route::get('/admin/appointments', [DoctorController::class, 'manageAppointments'])->name('admin.appointments');

    // Patient Appointment Routes
Route::get('/patient/book-appointment', [App\Http\Controllers\DoctorController::class, 'showAppointmentForm'])->name('patient.book');
Route::post('/patient/store-appointment', [App\Http\Controllers\DoctorController::class, 'storeAppointment']);
Route::get('/patient/history', [App\Http\Controllers\DoctorController::class, 'patientHistory'])->name('patient.history');

// View Appointments Page
Route::get('/admin/appointments', [DoctorController::class, 'manageAppointments'])->name('admin.appointments');

// Update Appointment Status
Route::post('/admin/appointments/update/{id}', [DoctorController::class, 'updateStatus']);
});