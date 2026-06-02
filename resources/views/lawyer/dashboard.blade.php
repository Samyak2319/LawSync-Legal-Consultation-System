@extends('layouts.app')

@section('title', 'Lawyer Dashboard - LawSync')

@section('content')

<div class="container-fluid px-4 mt-4 mb-5">

    <!-- TOP HEADER -->
    <div class="bg-dark text-white rounded-4 p-4 shadow-sm mb-4">

        <div class="d-flex justify-content-between align-items-center flex-wrap">

            <div>
                <h2 class="fw-bold mb-1">
                    ⚖️ Lawyer Control Panel
                </h2>

                <p class="mb-0 text-light">
                    Manage your professional presence, appointments, and client interactions.
                </p>
            </div>

            <div class="mt-3 mt-md-0">
                <a href="{{ route('lawyer.edit') }}"
                   class="btn btn-warning fw-semibold px-4">
                    ✏️ Edit Profile
                </a>
            </div>

        </div>

    </div>

    <!-- APPROVAL STATUS -->
    @if(!$lawyer->approved)

        <div class="alert alert-warning border-0 shadow-sm rounded-4 mb-4">
            ⏳ <strong>Verification Pending:</strong>
            Your lawyer profile is under admin review.
            Clients will be able to book appointments after approval.
        </div>

    @else

        <div class="alert alert-success border-0 shadow-sm rounded-4 mb-4">
            ✅ Your profile is approved and publicly visible.
        </div>

    @endif


    <!-- DASHBOARD GRID -->
    <div class="row g-4">

        <!-- SIDEBAR PROFILE -->
        <div class="col-lg-4">

            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">

                <!-- PROFILE TOP -->
                <div class="bg-primary text-white text-center p-4">

                    @if($lawyer->profile_picture)
                        <img src="{{ asset('storage/' . $lawyer->profile_picture) }}"
                             class="rounded-circle border border-4 border-white shadow"
                             width="120"
                             height="120"
                             style="object-fit:cover;">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($lawyer->user->name) }}&background=ffffff&color=0D6EFD&size=120"
                             class="rounded-circle border border-4 border-white shadow">
                    @endif

                    <h3 class="fw-bold mt-3 mb-1">
                        {{ $lawyer->user->name }}
                    </h3>
                    <div class="mt-2 mb-3">

                        <span class="badge bg-warning text-dark px-3 py-2 fs-6">

                            ⭐ {{ $lawyer->averageRating() ?: '0.0' }}/5

                        </span>

                        <span class="text-muted ms-2">

                            ({{ $lawyer->reviews->count() }} Reviews)

                        </span>

                    </div>
                    <p class="mb-0">
                        {{ $lawyer->specialization }}
                    </p>

                </div>

                <!-- PROFILE BODY -->
                <div class="card-body p-4">

                    <div class="mb-3">
                        <small class="text-muted">📍 LOCATION</small>
                        <h6 class="fw-semibold mt-1">
                            {{ $lawyer->location }}
                        </h6>
                    </div>

                    <div class="mb-3">
                        <small class="text-muted">💼 EXPERIENCE</small>
                        <h6 class="fw-semibold mt-1">
                            {{ $lawyer->experience }}
                        </h6>
                    </div>

                    <div class="mb-3">
                        <small class="text-muted">🎓 QUALIFICATION</small>
                        <h6 class="fw-semibold mt-1">
                            {{ $lawyer->qualification }}
                        </h6>
                    </div>

                    <div class="mb-3">
                        <small class="text-muted">🪪 BAR REGISTRATION</small>
                        <h6 class="fw-semibold mt-1">
                            {{ $lawyer->bar_registration_number }}
                        </h6>
                    </div>

                    <div class="mb-4">
                        <small class="text-muted">🏢 CHAMBER ADDRESS</small>
                        <h6 class="fw-semibold mt-1">
                            {{ $lawyer->chamber_address }}
                        </h6>
                    </div>

                    <div class="d-grid gap-2">

                        <a href="{{ route('lawyer.edit') }}"
                           class="btn btn-warning fw-semibold">
                            Edit Professional Profile
                        </a>

                        @if($lawyer->approved)
                            <a href="{{ route('lawyer.show', $lawyer->id) }}"
                               class="btn btn-outline-dark">
                                🌐 View Public Profile
                            </a>
                        @endif

                    </div>

                </div>

            </div>

        </div>


        <!-- MAIN CONTENT -->
        <div class="col-lg-8">

            <!-- QUICK STATS -->
            <div class="row g-3 mb-4">

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 bg-primary text-white">
                        <div class="card-body">
                            <h6>Total Requests</h6>
                            <h2 class="fw-bold">
                                {{ $bookings->count() }}
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 bg-success text-white">
                        <div class="card-body">
                            <h6>Accepted</h6>
                            <h2 class="fw-bold">
                                {{ $bookings->where('status', 'accepted')->count() }}
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 bg-warning text-dark">
                        <div class="card-body">
                            <h6>Pending</h6>
                            <h2 class="fw-bold">
                                {{ $bookings->where('status', 'pending')->count() }}
                            </h2>
                        </div>
                    </div>
                </div>

            </div>


            <!-- APPOINTMENTS -->
            <div class="card border-0 shadow-lg rounded-4">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <div>
                            <h4 class="fw-bold mb-1">
                                📅 Appointment Requests
                            </h4>

                            <p class="text-muted mb-0">
                                Review and manage consultation requests.
                            </p>
                        </div>

                    </div>

                    @forelse($bookings as $booking)

                        <div class="card border-0 shadow-sm rounded-4 mb-3">

                            <div class="card-body">

                                <div class="d-flex justify-content-between align-items-start flex-wrap">

                                    <!-- CLIENT DETAILS -->
                                    <div>

                                        <h5 class="fw-bold mb-1">
                                            👤 {{ $booking->user->name }}
                                        </h5>

                                        <p class="text-muted mb-2">
                                            {{ $booking->user->email }}
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

                                    <!-- STATUS -->
                                    <div class="text-end mt-2 mt-md-0">

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

                                <!-- ACTION BUTTONS -->
                                @if($booking->status == 'pending')

                                    <div class="mt-3 d-flex gap-2">

                                        <form method="POST"
                                              action="{{ route('booking.accept', $booking->id) }}">
                                            @csrf

                                            <button class="btn btn-success">
                                                ✅ Accept
                                            </button>
                                        </form>

                                        <form method="POST"
                                              action="{{ route('booking.reject', $booking->id) }}">
                                            @csrf

                                            <button class="btn btn-danger">
                                                ❌ Reject
                                            </button>
                                        </form>

                                    </div>

                                @endif

                            </div>

                        </div>

                    @empty

                        <div class="text-center py-5">

                            <img src="https://cdn-icons-png.flaticon.com/512/4076/4076478.png"
                                 width="120"
                                 class="mb-3">

                            <h5 class="fw-bold">
                                No Appointment Requests Yet
                            </h5>

                            <p class="text-muted">
                                Client consultation requests will appear here.
                            </p>

                        </div>

                    @endforelse

                </div>

            </div>

        </div>
        <!-- CASE HISTORY SECTION -->
         <div class="card shadow-sm border-0 mt-5">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold mb-0">⚖️ Case History</h4>
                </div>

                <!-- ADD CASE FORM -->

                <form method="POST" action="{{ route('case.history.store') }}">
                    @csrf

                    <div class="row g-3">

                        <div class="col-md-12">
                            <label class="form-label">Case Description</label>
                            <input type="text"
                                name="case_description"
                                class="form-control"
                                placeholder="Enter case description">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Filing Date</label>
                            <input type="date"
                                name="filing_date"
                                class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Registration Date</label>
                            <input type="date"
                                name="registration_date"
                                class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Hearing Date</label>
                            <input type="date"
                                name="hearing_date"
                                class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Case Status</label>

                            <select name="status" class="form-select">
                                <option value="Pending">Pending</option>
                                <option value="Running">Running</option>
                                <option value="Closed">Closed</option>
                            </select>
                        </div>

                        <div class="col-md-6 d-flex align-items-end">
                            <button class="btn btn-primary w-100">
                                Add Case
                            </button>
                        </div>

                    </div>
                </form>

                <hr class="my-4">

                <!-- CASE TABLE -->

                <div class="table-responsive">

                    <table class="table table-bordered align-middle">

                        <thead class="table-dark">
                            <tr>
                                <th>Description</th>
                                <th>Filing Date</th>
                                <th>Registration Date</th>
                                <th>Hearing Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse($caseHistories as $case)

                                <tr>

                                    <td>{{ $case->case_description }}</td>

                                    <td>{{ $case->filing_date }}</td>

                                    <td>{{ $case->registration_date }}</td>

                                    <td>{{ $case->hearing_date }}</td>

                                    <td>
                                        @if($case->status == 'Pending')
                                            <span class="badge bg-warning text-dark">
                                                Pending
                                            </span>

                                        @elseif($case->status == 'Running')

                                            <span class="badge bg-primary">
                                                Running
                                            </span>

                                        @else

                                            <span class="badge bg-success">
                                                Closed
                                            </span>

                                        @endif
                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="5" class="text-center text-muted">
                                        No case history added yet
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>
        </div>
    </div>

</div>

@endsection