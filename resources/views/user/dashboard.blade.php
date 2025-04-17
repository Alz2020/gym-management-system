@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome, {{ auth()->user()->name }}! </h1>
    <p>This is your dashboard.</p>

    <div class="row">
        <!-- Book Appointments -->
        <div class="col-md-4">
            <a href="{{ route('appointments.index') }}" class="btn btn-primary btn-block">
                📅 Book Appointments
            </a>
        </div>

        <!-- Manage Payments -->
        <div class="col-md-4">
            <a href="{{ route('payments.index') }}" class="btn btn-success btn-block">
                💳 Manage Payments
            </a>
        </div>

        <!-- Track Progress -->
        <div class="col-md-4">
            <a href="{{ route('progress.index') }}" class="btn btn-info btn-block">
                📈 Track Progress
            </a>
        </div>
    </div>
</div>
@endsection
