@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Admin Dashboard</h2>

    <div class="row text-center">
        <div class="col-md-4">
            <div class="card p-4 shadow-sm">
                <h5>Total Users</h5>
                <h2>{{ $userCount }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4 shadow-sm">
                <h5>Total Appointments</h5>
                <h2>{{ $appointmentCount }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4 shadow-sm">
                <h5>Total Payments</h5>
                <h2>${{ number_format($paymentTotal, 2) }}</h2>
            </div>
        </div>
    </div>
</div>
@endsection
