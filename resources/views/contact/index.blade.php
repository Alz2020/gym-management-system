@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Contact Us</h2>
    <p>Fill out the form below to get in touch with us.</p>

    <form method="POST" action="{{ route('contact.submit') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Your Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea name="message" class="form-control" id="message" rows="4" placeholder="Type your message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>

    <hr>

    <h3 class="mt-4">Your Previous Messages</h3>
    @if($contacts->isEmpty())
        <p>You haven't submitted any messages yet.</p>
    @else
        @foreach ($contacts as $contact)
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title">{{ $contact->name }} ({{ $contact->email }})</h5>
                    <p class="card-text">{{ $contact->message }}</p>
                    <p class="text-muted">{{ $contact->created_at->format('d M Y, H:i') }}</>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
