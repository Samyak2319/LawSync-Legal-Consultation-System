@extends('layouts.app')
@section('title', 'My Appointments - LawSync')
@section('content')

<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">My Appointments</h2>
        <span class="text-muted">{{ $bookings->count() }} appointments</span>
    </div>

    @forelse($bookings as $booking)
        <div class="card p-4 mb-3 shadow-sm">

            <div class="d-flex justify-content-between">

                <div>
                    <h5 class="mb-1">
                        {{ $booking->lawyer->specialization }}
                    </h5>

                    <p class="mb-1 text-muted">
                        📍 {{ $booking->lawyer->location }}
                    </p>

                    <p class="mb-0 text-muted">
                        💼 Experience: {{ $booking->lawyer->experience ?? 'N/A' }}
                    </p>
                </div>

                <div class="text-end">
                    <span class="badge
                        @if($booking->status == 'pending') bg-warning
                        @elseif($booking->status == 'accepted') bg-success
                        @else bg-danger
                        @endif
                    ">
                        {{ ucfirst($booking->status) }}
                    </span>
                </div>

            </div>

        </div>

    @empty
        <div class="text-center mt-5">
            <h5>No appointments yet</h5>
            <p class="text-muted">Start by consulting a lawyer</p>
        </div>
    @endforelse

</div>

@endsection