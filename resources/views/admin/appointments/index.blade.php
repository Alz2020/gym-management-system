@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Appointments</h2>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>User</th>
                <th>Date</th>
                <th>Time</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
            <tr>
                <td>{{ $appointment->user->name }}</td>
                <td>{{ $appointment->date }}</td>
                <td>{{ $appointment->time }}</td>
                <td>{{ $appointment->notes }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $appointments->links() }}
</div>
@endsection
