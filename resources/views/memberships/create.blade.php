@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create New Membership</h2>

    {{-- Display Validation Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Membership Creation Form --}}
    <form action="{{ route('memberships.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Membership Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="duration" class="form-label">Duration (Months)</label>
            <input type="number" class="form-control" id="duration" name="duration" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price ($)</label>
            <input type="text" class="form-control" id="price" name="price" required>
        </div>

        <button type="submit" class="btn btn-primary">Create Membership</button>
    </form>
</div>
@endsection
