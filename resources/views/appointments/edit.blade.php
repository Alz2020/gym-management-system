@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Appointment</h2>

    <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="client_id" class="form-label">Client</label>
            <select name="client_id" class="form-control">
                <option value="">Select Client</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{ $appointment->client_id == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                @endforeach
            </select>
            @error('client_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="trainer_id" class="form-label">Trainer</label>
            <select name="trainer_id" class="form-control">
                <option value="">Select Trainer</option>
                @foreach ($trainers as $trainer)
                    <option value="{{ $trainer->id }}" {{ $appointment->trainer_id == $trainer->id ? 'selected' : '' }}>{{ $trainer->name }}</option>
                @endforeach
            </select>
            @error('trainer_id') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" class="form-control" value="{{ $appointment->date }}" />
            @error('date') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="time" class="form-label">Time</label>
            <input type="time" name="time" class="form-control" value="{{ $appointment->time }}" />
            @error('time') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Appointment</button>
    </form>
</div>
@endsection
