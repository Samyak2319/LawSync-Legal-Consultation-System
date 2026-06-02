@extends('layouts.app')
@section('title', 'User Dashboard - LawSync')
@section('content')

<div class="container mt-5 mb-5">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Welcome, {{ $user->name }} 👋
            </h2>

            <p class="text-muted mb-0">
                Manage your appointments and profile details.
            </p>
        </div>

        <a href="{{ route('profile.edit') }}" class="btn btn-primary px-4">
            ✏️ Edit Profile
        </a>

    </div>

    <div class="row g-4">

        <!-- PROFILE CARD -->
        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4">

                    <!-- PROFILE PHOTO -->
                    <div class="text-center mb-4">

                        @if($user->profile_photo)
                            <img src="{{ asset('storage/' . $user->profile_photo) }}"
                                 class="rounded-circle shadow-sm"
                                 width="110"
                                 height="110"
                                 style="object-fit:cover;">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=0D6EFD&color=fff"
                                 class="rounded-circle shadow-sm">
                        @endif

                    </div>

                    <!-- USER INFO -->
                    <h4 class="fw-bold text-center">
                        {{ $user->name }}
                    </h4>

                    <p class="text-muted text-center mb-4">
                        {{ $user->email }}
                    </p>

                    <div class="mb-3">
                        <strong>👤 Role:</strong>
                        {{ ucfirst($user->role) }}
                    </div>

                    @if($user->phone)
                    <div class="mb-3">
                        <strong>📞 Phone:</strong>
                        {{ $user->phone }}
                    </div>
                    @endif

                    @if($user->address)
                    <div class="mb-3">
                        <strong>📍 Address:</strong>
                        {{ $user->address }}
                    </div>
                    @endif

                    <hr>

                    <a href="{{ route('profile.edit') }}"
                       class="btn btn-warning w-100 fw-semibold">
                        Update Profile
                    </a>

                </div>

            </div>

        </div>

        <!-- APPOINTMENTS -->
        <div class="col-lg-8">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="fw-bold">
                    📅 My Appointments
                </h4>
            </div>

            @forelse($bookings as $booking)

                <div class="card border-0 shadow-sm rounded-4 mb-4">

                    <div class="card-body p-4">

                        <div class="d-flex justify-content-between align-items-start flex-wrap">

                            <!-- LEFT -->
                            <div>

                                <h5 class="fw-bold mb-1">
                                    {{ $booking->lawyer->user->name ?? 'Lawyer' }}
                                </h5>

                                <p class="text-primary mb-2">
                                    {{ $booking->lawyer->specialization ?? '' }}
                                </p>

                                <p class="mb-1 text-muted">
                                    📍 {{ $booking->lawyer->location ?? '' }}
                                </p>

                                @if($booking->appointment_type)
                                <p class="mb-1">
                                    🧾 Appointment Type:
                                    <strong>
                                        {{ ucfirst($booking->appointment_type) }}
                                    </strong>
                                </p>
                                @endif

                                @if($booking->description)
                                <p class="mb-0">
                                    📝 {{ $booking->description }}
                                </p>
                                @endif

                            </div>

                            <!-- RIGHT -->
                            <div class="text-end">

                                <span class="badge px-3 py-2 fs-6
                                    @if($booking->status == 'pending')
                                        bg-warning text-dark
                                    @elseif($booking->status == 'accepted')
                                        bg-success
                                    @else
                                        bg-danger
                                    @endif
                                ">
                                    {{ ucfirst($booking->status) }}
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            @empty

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body text-center p-5">

                        <h5 class="fw-bold mb-3">
                            No Appointments Yet
                        </h5>

                        <p class="text-muted">
                            You haven’t booked any lawyer consultation yet.
                        </p>

                        <a href="{{ route('home') }}" class="btn btn-primary px-4">
                            Find Lawyers
                        </a>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection