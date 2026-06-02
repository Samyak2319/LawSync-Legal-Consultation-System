@extends('layouts.app')

@section('content')

<!-- HERO -->
<div class="hero">
    <div class="container d-flex justify-content-between align-items-center flex-wrap">

        <div style="max-width:600px;">
            <span class="badge bg-light text-dark mb-3">Trusted Legal Help Online</span>

            <h1 class="display-5 fw-bold">
                Find the right lawyer for your legal needs
            </h1>

            <p class="mt-3 text-light">
                Explore verified lawyers, compare expertise, and book consultations securely.
            </p>

            <div class="mt-4">
                <a href="#lawyers" class="btn btn-light me-2">Talk to a Lawyer</a>
                <a href="#" class="btn btn-outline-light">Ask a Free Question</a>
            </div>
        </div>

        <!-- Search Box -->
        <div class="bg-white p-4 rounded shadow mt-4 mt-md-0" style="width:350px;">
            <h5 class="mb-3">Search Lawyers</h5>

            <form method="GET" action="/">
                <input type="text"
                    name="location"
                    class="form-control mb-2"
                    placeholder="Enter City"
                    value="{{ request('location') }}">
                <input type="text"
                    name="specialization"
                    class="form-control mb-3"
                    placeholder="Practice Area"
                    value="{{ request('specialization') }}">

                <button class="btn btn-primary w-100">Search</button>
            </form>
        </div>

    </div>
</div>

<!-- HOW IT WORKS -->
<div class="container mt-5 text-center">
    <h2 class="fw-bold">How LawSync works</h2>
    <p class="text-muted">Simple steps to connect with the right legal expert.</p>

    <div class="row mt-5 g-4">

        <!-- FIND LAWYERS -->
        <div class="col-md-4">
            <div class="card border-0 shadow-lg rounded-4 p-4 h-100 feature-card">

                <div class="feature-icon bg-primary bg-gradient text-white">
                    🔍
                </div>

                <h4 class="fw-bold mt-4">
                    Find Lawyers
                </h4>

                <p class="text-muted mt-3">
                    Discover experienced and verified lawyers based on specialization, city, and legal expertise.
                </p>

                <div class="mt-auto">
                    <span class="text-primary fw-semibold">
                        Explore Legal Experts →
                    </span>
                </div>

            </div>
        </div>


        <!-- BOOK APPOINTMENT -->
        <div class="col-md-4">
            <div class="card border-0 shadow-lg rounded-4 p-4 h-100 feature-card">

                <div class="feature-icon bg-success bg-gradient text-white">
                    📅
                </div>

                <h4 class="fw-bold mt-4">
                    Book Appointments
                </h4>

                <p class="text-muted mt-3">
                    Schedule online or offline consultations securely with an easy and professional booking system.
                </p>

                <div class="mt-auto">
                    <span class="text-success fw-semibold">
                        Secure Consultation →
                    </span>
                </div>

            </div>
        </div>


        <!-- WORLD CLASS LAWYERS -->
        <div class="col-md-4">
            <div class="card border-0 shadow-lg rounded-4 p-4 h-100 feature-card">

                <div class="feature-icon bg-warning bg-gradient text-dark">
                    ⚖️
                </div>

                <h4 class="fw-bold mt-4">
                    World Class Lawyers
                </h4>

                <p class="text-muted mt-3">
                    Connect with highly qualified legal professionals verified through Bar Council certification.
                </p>

                <div class="mt-auto">
                    <span class="text-warning fw-semibold">
                        Trusted Legal Support →
                    </span>
                </div>

            </div>
        </div>

    </div>
</div>

<!-- LAWYERS LIST -->
<div class="container mt-5" id="lawyers">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Available Lawyers</h2>
        <span class="text-muted">{{ $lawyers->count() }} found</span>
    </div>

    <div class="row g-4">

        @forelse($lawyers as $lawyer)
            <div class="col-md-4">

                <div class="card h-100 p-4 shadow-sm">
                    <div class="text-center mb-3">
                        <img src="{{ asset('storage/' . $lawyer->profile_picture) }}"
                            class="rounded-circle shadow-sm"
                            style="width:120px;height:120px;object-fit:cover;">
                    </div>

                    <!-- NAME -->
                    <h5 class="fw-bold mb-1">
                        <a href="{{ route('lawyer.show', $lawyer->id) }}" class="text-decoration-none text-dark">
                            {{ $lawyer->user->name ?? 'Lawyer' }}
                        </a>
                    </h5>

                    <!-- SPECIALIZATION -->
                    <span class="text-primary small mb-2 d-block">
                        {{ $lawyer->specialization }}
                    </span>

                    <!-- DETAILS -->
                    <p class="mb-1 text-muted">
                        📍 {{ $lawyer->location }}
                    </p>

                    <p class="mb-1 text-muted">
                        💼 {{ $lawyer->experience }} experience
                    </p>

                    <!-- BIO -->
                    <p class="text-muted small">
                        {{ \Illuminate\Support\Str::limit($lawyer->bio, 90) }}
                    </p>

                    <!-- ACTION BUTTONS -->
                    <div class="mt-auto">

                        <a href="{{ route('lawyer.show', $lawyer->id) }}" 
                           class="btn btn-outline-dark w-100 mb-2">
                            View Profile
                        </a>

                        @auth
                            <a href="{{ route('lawyer.show', $lawyer->id) }}"
                                class="btn btn-primary w-100">

                                    Book Appointment

                                </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-primary w-100">
                                Login to Book
                            </a>
                        @endauth

                    </div>

                </div>

            </div>

        @empty
            <div class="text-center mt-5">
                <h5>No lawyers available</h5>
                <p class="text-muted">Please check back later</p>
            </div>
        @endforelse

    </div>

</div>

@endsection