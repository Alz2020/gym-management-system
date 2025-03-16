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
                <p>Schedule your workouts with trainers effortlessly.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm text-center p-3">
                <i class="bi bi-credit-card display-4 text-success"></i>
                <h4 class="mt-3">Manage Payments</h4>
                <p>Track and manage your membership subscriptions.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm text-center p-3">
                <i class="bi bi-bar-chart-line display-4 text-danger"></i>
                <h4 class="mt-3">Track Progress</h4>
                <p>Monitor your fitness journey with detailed analytics.</p>
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
