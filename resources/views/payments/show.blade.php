@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4">🔍 Payment Details</h2>

    <div class="card mt-3">
        <div class="card-body">
            <h5 class="card-title">Payment ID: {{ $payment->payment_reference }}</h5>
            <p class="card-text"><strong>Amount:</strong> £{{ number_format($payment->amount, 2) }}</p>
            <p class="card-text"><strong>Status:</strong>
                <span class="badge bg-{{ $payment->status == 'Completed' ? 'success' : 'warning' }}">
                    {{ ucfirst($payment->status) }}
                </span>
            </p>
            <p class="card-text"><strong>Date:</strong> {{ $payment->created_at->format('Y-m-d H:i') }}</p>
            <a href="{{ route('payments.index') }}" class="btn btn-secondary mt-3">⬅️ Back to Payments</a>
        </div>
    </div>
</div>
@endsection
