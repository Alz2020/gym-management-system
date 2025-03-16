<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes (only for authenticated users)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Role-based dashboards
    Route::get('/admin-dashboard', [DashboardController::class, 'admin'])
        ->middleware('role:admin') // Middleware applied correctly
        ->name('admin.dashboard');

    Route::get('/trainer-dashboard', [DashboardController::class, 'trainer'])
        ->middleware('role:trainer')
        ->name('trainer.dashboard');

    Route::get('/member-dashboard', [DashboardController::class, 'member'])
        ->middleware('role:member')
        ->name('member.dashboard');

    // Resource routes
    Route::resources([
        'memberships'  => MembershipController::class,
        'payments'     => PaymentController::class,
        'trainers'     => TrainerController::class,
        'appointments' => AppointmentController::class,
    ]);
});
