@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">🧑‍🏫 Consulting Services</h1>
    <p class="lead">Get personalized advice and guidance from our expert trainers.</p>

    <div class="card shadow-sm p-4">
        <h4>Why Choose Our Consulting?</h4>
        <ul>
            <li>🏋️ Tailored fitness and nutrition plans</li>
            <li>📈 Monthly progress reviews</li>
            <li>📅 Flexible appointment scheduling</li>
        </ul>
        <a href="{{ route('contact.index') }}" class="btn btn-primary mt-3">
            Book a Consulting Appointment
        </a>
    </div>
</div>
@endsection
