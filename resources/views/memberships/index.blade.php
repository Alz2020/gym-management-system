@extends('layouts.app')

@section('content')
    <h1>Memberships</h1>
    <a href="{{ route('memberships.create') }}">Create Membership</a>
    <ul>
        @foreach($memberships as $membership)
            <li>{{ $membership->name }} - ${{ $membership->price }}</li>
        @endforeach
    </ul>
@endsection
