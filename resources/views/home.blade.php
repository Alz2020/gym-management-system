@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Hero Section -->
    <div class="text-center">
        <h1 class="display-4 fw-bold">Welcome to the Gym Management System</h1>
        <p class="lead">Manage your fitness journey efficiently with our platform.</p>
        <a href="{{ route('register') }}" class="btn btn-primary btn-lg">Get Started</a>
    </div>

    <!-- Features Section -->
    <div class="row mt-5">
        <div class="col-md-4">
            <div class="card shadow-sm text-center p-3">
                <i class="bi bi-calendar-check display-4 text-primary"></i>
                <h4 class="mt-3">Book Appointments</h4>
                <a href="{{ route('appointments.index') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-calendar-check"></i>
                </a>
                <p>Schedule your workouts with trainers effortlessly.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm text-center p-3">
                <i class="bi bi-credit-card display-4 text-success"></i>
                <h4 class="mt-3">Manage Payments</h4>
                <a href="{{ route('payments.index') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-credit-card"></i>
                </a>
                <p>Track and manage your membership subscriptions.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm text-center p-3">
                <i class="bi bi-bar-chart-line display-4 text-danger"></i>
                <h4 class="mt-3">Track Progress</h4>
                <a href="{{ route('progress.index') }}" class="btn btn-primary btn-lg">
                    <i class="fas fa-chart-line"></i>
                </a>
                <p>Monitor your fitness journey with detailed analytics.</p>
            </div>
        </div>
    </div>

    <!-- Additional Features -->
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card shadow-sm text-center p-3">
                <i class="bi bi-envelope display-4 text-info"></i>
                <h4 class="mt-3">Contact Us</h4>
                <a href="{{ route('contact.index') }}" class="btn btn-success btn-lg">
                    <i class="fas fa-envelope"></i>
                </a>
                <p>Have questions? Reach out to us for support and inquiries.</p>
            </div>
        </div>
    <!--Consulting -->
    <div class="col-md-4">
        <div class="card shadow-sm text-center p-3">
            <i class="bi bi-people display-4 text-info"></i>
            <h4 class="mt-3">Consulting</h4>
            <a href="{{ route('consulting.index') }}" class="btn btn-success btn-lg">
                <i class="fas fa-users"></i>
            </a>
            <p>Get personalised advice from our experienced trainers.</p>
        </div>
    </div>
        <div class="col-md-4">
            <div class="card shadow-sm text-center p-3">
                <i class="bi bi-shield-lock display-4 text-warning"></i>
                <h4 class="mt-3">Admin Panel</h4>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-danger btn-lg">
                    <i class="fas fa-user-shield"></i>
                </a>
                <p>Manage the gym system, users, and settings.</p>
            </div>
        </div>
    </div>

    <!-- Quick Navigation -->
    <div class="text-center mt-5">
        <h3>Quick Access</h3>
        <div class="d-flex justify-content-center mt-3">
            <a href="{{ route('login') }}" class="btn btn-outline-primary mx-2">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline-success mx-2">Sign Up</a>
        </div>
    </div>
</div>
@endsection
