@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Enter OTP</h2>
        <form action="{{ route('verify.otp.submit') }}" method="POST">
            @csrf
            <div>
                <label for="otp">OTP Code:</label>
                <input type="text" name="otp" required>
            </div>
            <button type="submit">Verify OTP</button>
        </form>
    </div>
@endsection
