@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4">💰 Make a Payment</h2>

    <form action="{{ route('payments.store') }}" method="POST" class="mt-3">
        @csrf

        <div class="mb-3">
            <label for="amount" class="form-label">Amount (£)</label>
            <input type="number" name="amount" class="form-control" step="0.01" min="1" required>
        </div>

        <div class="mb-3">
            <label for="payment_reference" class="form-label">Payment Reference</label>
            <input type="text" name="payment_reference" class="form-control" placeholder="e.g. PAY123456" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-select" required>
                <option value="Pending">Pending</option>
                <option value="Completed">Completed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Submit Payment</button>
        <a href="{{ route('payments.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
