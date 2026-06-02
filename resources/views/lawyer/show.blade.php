@extends('layouts.app')

@section('content')

<div class="container mt-5 mb-5">


    <!-- VALIDATION ERRORS -->
    @if ($errors->any())
        <div class="alert alert-danger shadow-sm border-0 rounded-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="card shadow-lg border-0 rounded-4 p-4">

        <div class="row g-5">

            <!-- LEFT SIDE -->
            <div class="col-lg-8">

                <!-- PROFILE HEADER -->
                <div class="d-flex align-items-center flex-wrap mb-4">

                    @if($lawyer->profile_picture)
                        <img src="{{ asset('storage/' . $lawyer->profile_picture) }}"
                             class="rounded-circle shadow-sm me-4 mb-3 mb-md-0"
                             style="width:140px;height:140px;object-fit:cover;">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($lawyer->user->name) }}&background=0D6EFD&color=fff&size=140"
                             class="rounded-circle shadow-sm me-4 mb-3 mb-md-0">
                    @endif

                    <div>

                        <h2 class="fw-bold mb-2">
                            👨‍⚖️ {{ $lawyer->user->name }}
                        </h2>

                        <span class="badge bg-primary px-3 py-2 fs-6">
                            ⚖️ {{ $lawyer->specialization }}
                        </span>

                    </div>

                </div>

                <!-- LAWYER DETAILS -->
                <div class="card border-0 bg-light rounded-4 p-4 mb-4">

                    <div class="row">

                        <div class="col-md-6 mb-3">
                            <strong>📍 Location</strong>
                            <p class="mb-0 text-muted">
                                {{ $lawyer->location }}
                            </p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>💼 Experience</strong>
                            <p class="mb-0 text-muted">
                                {{ $lawyer->experience }}
                            </p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>🪪 BAR Registration</strong>
                            <p class="mb-0 text-muted">
                                {{ $lawyer->bar_registration_number }}
                            </p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <strong>🎓 Qualification</strong>
                            <p class="mb-0 text-muted">
                                {{ $lawyer->qualification }}
                            </p>
                        </div>

                        <div class="col-12">
                            <strong>🏛️ Chamber Address</strong>
                            <p class="mb-0 text-muted">
                                {{ $lawyer->chamber_address }}
                            </p>
                        </div>

                    </div>

                </div>

                <!-- ABOUT -->
                <div class="mb-5">

                    <h4 class="fw-bold mb-4">
                        📝 About
                    </h4>

                    <p class="text-muted">
                        {{ $lawyer->bio }}
                    </p>
                    
                    <!-- CASE HISTORY -->
                    
                    <div class="mt-5">
                        
                        <h4 class="fw-bold mb-4">
                            ⚖️ Case History
                        </h4>
                        
                        <div class="card border-0 shadow-sm rounded-4">
                            
                            <div class="card-body p-0">
    
                                <div class="table-responsive">
    
                                    <table class="table align-middle mb-0">
    
                                        <thead class="table-dark">
                                            
                                            <tr>
                                                <th>Case Description</th>
                                                <th>Filing Date</th>
                                                <th>Registration Date</th>
                                                <th>Hearing Date</th>
                                                <th>Status</th>
                                            </tr>
    
                                        </thead>
    
                                        <tbody>
    
                                            @forelse($lawyer->caseHistories as $case)
                                            
                                                <tr>
    
                                                    <td>
                                                        {{ $case->case_description }}
                                                    </td>
    
                                                    <td>
                                                        {{ $case->filing_date }}
                                                    </td>
    
                                                    <td>
                                                        {{ $case->registration_date }}
                                                    </td>
    
                                                    <td>
                                                        {{ $case->hearing_date }}
                                                    </td>
                                                    
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
                                                    
                                                    <td colspan="5" class="text-center py-4 text-muted">
    
                                                        No case history available.
    
                                                    </td>
                                                    
                                                </tr>
                                                
                                            @endforelse
    
                                        </tbody>
    
                                    </table>
    
                                </div>
    
                            </div>
                            
                        </div>
                        
                    </div>
                    <!-- REVIEW SECTION -->
                    <div class="card border-0 shadow-sm rounded-4 p-4 mt-5">
        
                                <h4 class="fw-bold mb-4">
                                    ⭐ Client Reviews & Ratings
                                </h4>
        
                                <!-- SUCCESS MESSAGE -->
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
        
                                <!-- ERROR MESSAGE -->
                                @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
        
                                <!-- REVIEW FORM -->
                                @auth
        
                                    <form action="{{ route('review.store', $lawyer->id) }}" method="POST">
        
                                        @csrf
        
                                        <!-- RATING -->
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">
                                                Give Rating
                                            </label>
        
                                            <select name="rating" class="form-select" required>
                                                <option value="">Select Rating</option>
                                                <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                                                <option value="4">⭐⭐⭐⭐ (4)</option>
                                                <option value="3">⭐⭐⭐ (3)</option>
                                                <option value="2">⭐⭐ (2)</option>
                                                <option value="1">⭐ (1)</option>
                                            </select>
                                        </div>
        
                                        <!-- COMMENT -->
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">
                                                Write Review
                                            </label>
        
                                            <textarea name="comment"
                                                    rows="4"
                                                    class="form-control"
                                                    placeholder="Share your experience with this lawyer..."></textarea>
                                        </div>
        
                                        <button class="btn btn-warning px-4">
                                            Submit Review
                                        </button>
        
                                    </form>
        
                                @else
        
                                    <div class="alert alert-info">
                                        Please login to submit a review.
                                    </div>
        
                                @endauth
        
                    </div>
                    <!-- ALL REVIEWS -->
                    <div class="mt-5">

                        <h4 class="fw-bold mb-4">
                            💬 What Clients Say
                        </h4>

                        @forelse($lawyer->reviews as $review)

                            <div class="card border-0 shadow-sm rounded-4 mb-4">

                                <div class="card-body">

                                    <!-- USER -->
                                    <div class="d-flex justify-content-between align-items-center mb-3">

                                        <div>

                                            <h6 class="fw-bold mb-1">
                                                {{ $review->user->name }}
                                            </h6>

                                            <small class="text-muted">
                                                {{ $review->created_at->diffForHumans() }}
                                            </small>

                                        </div>

                                        <!-- STARS -->
                                        <div class="text-warning fs-5">

                                            @for($i = 1; $i <= 5; $i++)

                                                @if($i <= $review->rating)
                                                    ⭐
                                                @else
                                                    ☆
                                                @endif

                                            @endfor

                                        </div>

                                    </div>

                                    <!-- COMMENT -->
                                    <p class="text-muted mb-0" style="line-height:1.7;">

                                        {{ $review->comment }}

                                    </p>

                                </div>

                            </div>

                        @empty

                            <div class="alert alert-light border text-muted">

                                No reviews available yet.

                            </div>

                        @endforelse

                    </div>

                </div>
                
            </div>
            

            <!-- RIGHT SIDE -->
            <div class="col-lg-4">

                <div class="card border-0 shadow rounded-4 p-4 sticky-top">

                    <div class="text-center mb-4">

                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center"
                             style="width:80px;height:80px;">

                            <span style="font-size:35px;">⚖️</span>

                        </div>

                        <h4 class="fw-bold mt-3">
                            Book Appointment
                        </h4>

                        <p class="text-muted small">
                            Securely connect with this verified lawyer.
                        </p>

                    </div>

                    @auth

                        <form method="POST"
                              action="{{ route('book.lawyer', $lawyer->id) }}">

                            @csrf

                            <!-- TYPE -->
                            <div class="mb-3">

                                <label class="form-label fw-semibold">
                                    🧾 Consultation Type
                                </label>

                                <select name="appointment_type"
                                        class="form-select rounded-3"
                                        required>

                                    <option value="">
                                        Select Consultation Type
                                    </option>

                                    <option value="online">
                                        Online Consultation
                                    </option>

                                    <option value="offline">
                                        Offline Consultation
                                    </option>

                                </select>

                            </div>


                            <!-- DESCRIPTION -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold">
                                    📝 Describe Your Legal Issue
                                </label>

                                <textarea name="description"
                                          rows="6"
                                          class="form-control rounded-3"
                                          placeholder="Explain your legal issue, case details, or consultation requirement..."
                                          required></textarea>

                            </div>

                            <!-- BUTTON -->
                            <button type="submit"
                                    class="btn btn-primary w-100 py-2 fw-semibold rounded-3">

                                📅 Send Appointment Request

                            </button>

                        </form>

                    @else

                        <div class="text-center">

                            <p class="text-muted mb-3">
                                Login required to book an appointment.
                            </p>

                            <a href="{{ route('login') }}"
                               class="btn btn-outline-primary w-100 py-2 fw-semibold rounded-3">

                                🔐 Login to Continue

                            </a>

                        </div>

                    @endauth

                </div>

            </div>

        </div>

    </div>

</div>

@endsection