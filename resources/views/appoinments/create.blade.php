@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4 text-center">Create Appointment</h2>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('appointments.store') }}" method="POST">
                @csrf
                
                <!-- Client Selection -->
                <div class="mb-3">
                    <label class="form-label">Client</label>
                    <select name="client_id" class="form-control @error('client_id') is-invalid @enderror" required>
                        <option value="">Select Client</option>
                        @foreach($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->name }}</option>
                        @endforeach
                    </select>
                    @error('client_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Trainer Selection -->
                <div class="mb-3">
                    <label class="form-label">Trainer</label>
                    <select name="trainer_id" class="form-control @error('trainer_id') is-invalid @enderror" required>
                        <option value="">Select Trainer</option>
                        @foreach($trainers as $trainer)
                            <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                        @endforeach
                    </select>
                    @error('trainer_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Date Selection -->
                <div class="mb-3">
                    <label class="form-label">Date</label>
                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" required>
                    @error('date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Time Selection -->
                <div class="mb-3">
                    <label class="form-label">Time</label>
                    <input type="time" name="time" class="form-control @error('time') is-invalid @enderror" required>
                    @error('time') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-dark w-100">Create Appointment</button>
            </form>
        </div>
    </div>
</div>
@endsection
