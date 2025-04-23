@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4">💳 Manage Payments</h2>
    <p>View and manage your payments below.</p>

    <!-- Payment Table -->
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Payment ID</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($payments as $index => $payment)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $payment->payment_reference }}</td>
                    <td>£{{ number_format($payment->amount, 2) }}</td>
                    <td>
                        <span class="badge bg-{{ $payment->status == 'Completed' ? 'success' : 'warning' }}">
                            {{ ucfirst($payment->status) }}
                        </span>
                    </td>
                    <td>{{ $payment->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('payments.show', $payment->id) }}" class="btn btn-info btn-sm">View</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No payment records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Payment Actions -->
    <a href="{{ route('payments.create') }}" class="btn btn-primary">💰 Make a Payment</a>
</div>
@endsection
