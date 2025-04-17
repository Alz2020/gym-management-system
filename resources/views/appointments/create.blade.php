@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Create Appointment</h2>

    <form action="{{ route('appointments.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="client_name" class="form-label">Your Name</label>
            <input type="text" name="client_name" class="form-control" value="{{ old('client_name') }}" required>
            @error('client_name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" name="phone_number" class="form-control" value="{{ old('phone_number') }}" required>
            @error('phone_number') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" class="form-control" value="{{ old('date') }}" required>
            @error('date') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="time" class="form-label">Time</label>
            <input type="time" name="time" class="form-control" value="{{ old('time') }}" required>
            @error('time') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Book Appointment</button>
    </form>
</div>
@endsection
