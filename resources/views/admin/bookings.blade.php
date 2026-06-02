@extends('layouts.admin')

@section('content')

<h3>Bookings</h3>

<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>User</th>
            <th>Lawyer</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($bookings as $booking)
        <tr>
            <td>{{ $booking->user->name }}</td>
            <td>{{ $booking->lawyer->specialization }}</td>

            <td>
                <span class="badge
                    @if($booking->status == 'pending') bg-warning
                    @elseif($booking->status == 'accepted') bg-success
                    @else bg-danger
                    @endif">
                    {{ ucfirst($booking->status) }}
                </span>
            </td>

            <td>
                <form method="POST" action="{{ route('admin.booking.delete', $booking->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Cancel</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection