@extends('layouts.admin')
@section('content')
    <h2>Membership Plans</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Duration</th>
            </tr>
        </thead>
        <tbody>
@foreach ($memberships as $membership)
    <tr>
        <td>{{ $membership->id }}</td>
        <td>{{ $membership->name }}</td>
        <td>{{ $membership->description }}</td>
        <td>£{{ $membership->price }}</td>
        <td>{{ $membership->duration }} months</td>
    </tr>
@endforeach
</tbody>
</table>
{{ $membership->links() }} {{-- Pagination --}}
@endsection

