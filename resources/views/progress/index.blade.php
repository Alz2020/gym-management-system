@extends('layouts.app')

@section('content')
<div class="container">
    <h2>📊 Track Your Progress</h2>
    <p>Welcome, {{ auth()->user()->name }}! Here is your fitness progress:</p>

    @if($progress->isEmpty())
        <p>No progress records found.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Weight (kg)</th>
                    <th>Body Fat (%)</th>
                    <th>Workout Sessions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($progress as $entry)
                    <tr>
                        <td>{{ $entry->created_at->format('d M Y') }}</td>
                        <td>{{ $entry->weight ?? 'N/A' }}</td>
                        <td>{{ $entry->body_fat ?? 'N/A' }}</td>
                        <td>{{ $entry->workout_sessions }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
