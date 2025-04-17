@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 450px;">
        <h3 class="text-center mb-4">Update Profile</h3>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Update Form -->
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
            </div>

            <!-- Password (Optional) -->
            <div class="mb-3">
                <label for="password" class="form-label">New Password (Leave blank to keep current password)</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <!-- Update Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>

        <!-- Back to Dashboard -->
        <div class="text-center mt-3">
            <small><a href="{{ route('dashboard') }}">Back to Dashboard</a></small>
        </div>
    </div>
</div>
@endsection
