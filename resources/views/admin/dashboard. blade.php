@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome, {{ auth()->user()->name }} (Administrator)!</h1>
    <p>This is your Admin Dashboard.</p>

    <div class="row">
        <!-- Manage Users -->
        <div class="col-md-4">
            <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-block">
                👤 Manage Users
            </a>
        </div>

        <!-- View Reports -->
        <div class="col-md-4">
            <a href="{{ route('admin.reports.index') }}" class="btn btn-success btn-block">
                📊 View Reports
            </a>
        </div>

        <!-- Manage Gym Settings -->
        <div class="col-md-4">
            <a href="{{ route('admin.settings.index') }}" class="btn btn-warning btn-block">
                ⚙️ Gym Settings
            </a>
        </div>
    </div>
</div>
@endsection
