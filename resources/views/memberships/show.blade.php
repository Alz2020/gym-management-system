@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Membership Details</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $membership->name }}</h5>
            <p class="card-text"><strong>Duration:</strong> {{ $membership->duration }} months</p>
            <p class="card-text"><strong>Price:</strong> ${{ $membership->price }}</p>

            <a href="{{ route('memberships.index') }}" class="btn btn-secondary">Back to List</a>
            <a href="{{ route('memberships.edit', $membership->id) }}" class="btn btn-warning">Edit</a>

            <form action="{{ route('memberships.destroy', $membership->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
