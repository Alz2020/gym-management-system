<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    AuthController,
    UserController,
    AppointmentController,
    PaymentController,
    ProgressController,
    ContactController,
    ConsultingController,
    AdminController,
    AdminDashboardController
};

// Home Route
Route::get('/', [HomeController::class, 'index'])->name('home');
// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Authenticated User Routes
Route::middleware('auth')->group(function () {
    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('/appointments/store', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('/payments/store', [PaymentController::class, 'store'])->name('payments.store');
    Route::get('/payments/{id}', [PaymentController::class, 'show'])->name('payments.show');
    Route::get('/progress', [ProgressController::class, 'index'])->name('progress.index');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::post('/contact/submit', [ContactController::class, 'store'])->name('contact.submit');
    Route::get('/consulting', [ConsultingController::class, 'index'])->name('consulting.index');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
});
// Admin-only routes
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/users', [AdminController::class, 'users'])->name('users.index');
    Route::get('/appointments', [AdminController::class, 'appointments'])->name('appointments.index');
    Route::get('/payments', [AdminController::class, 'payments'])->name('payments.index');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
});
