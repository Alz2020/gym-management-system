@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4 text-center">Manage Appointments</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Add New Appointment Button -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('appointments.create') }}" class="btn btn-dark">+ Add Appointment</a>
    </div>

    <!-- Appointments Table -->
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Client</th>
                        <th>Trainer</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appointments as $appointment)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ optional($appointment->client)->name ?? 'Not Assigned' }}</td>
                            <td>{{ optional($appointment->trainer)->name ?? 'Not Assigned' }}</td>
                            <td>{{ $appointment->date }}</td>
                            <td>{{ $appointment->time }}</td>
                            <td>
                                <span class="badge bg-{{ $appointment->status == 'Confirmed' ? 'success' : 'warning' }}">
                                    {{ $appointment->status ?? 'Pending' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No appointments found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
