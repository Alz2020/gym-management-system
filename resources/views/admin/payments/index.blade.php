@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Payments</h2>
    <table class="table table-hover mt-3">
        <thead>
            <tr>
                <th>User</th>
                <th>Amount</th>
                <th>Method</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $payment)
            <tr>
                <td>{{ $payment->user->name }}</td>
                <td>${{ number_format($payment->amount, 2) }}</td>
                <td>{{ $payment->method }}</td>
                <td>{{ $payment->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $payments->links() }}
</div>
@endsection
