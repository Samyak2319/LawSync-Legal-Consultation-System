@extends('layouts.app')
@section('title', 'Contact Us - LawSync')
@section('content')

<div class="container mt-5 mb-5">

    <!-- HEADER -->
    <div class="text-center mb-5">

        <h1 class="fw-bold">
            📞 Contact Us
        </h1>

        <p class="text-muted mt-3">
            Have legal questions or need support? Reach out to the LawSync team.
        </p>

    </div>

    <div class="row g-5">

        <!-- CONTACT FORM -->
        <div class="col-md-7">

            <div class="card border-0 shadow-lg rounded-4 p-4">

                <h4 class="fw-bold mb-4">
                    Send us a message
                </h4>

                <form>

                    <div class="mb-3">
                        <label class="form-label">Full Name</label>

                        <input type="text"
                               class="form-control"
                               placeholder="Enter your full name">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email Address</label>

                        <input type="email"
                               class="form-control"
                               placeholder="Enter your email">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Subject</label>

                        <input type="text"
                               class="form-control"
                               placeholder="Enter subject">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Message</label>

                        <textarea class="form-control"
                                  rows="5"
                                  placeholder="Write your message..."></textarea>
                    </div>

                    <button class="btn btn-primary px-4 py-2">
                        Send Message
                    </button>

                </form>

            </div>

        </div>

        <!-- CONTACT INFO -->
        <div class="col-md-5">

            <div class="card border-0 shadow-lg rounded-4 p-4 h-100">

                <h4 class="fw-bold mb-4">
                    Contact Information
                </h4>

                <div class="mb-4">
                    <h6 class="fw-semibold">
                        📍 Office Address
                    </h6>

                    <p class="text-muted">
                        Kolkata, West Bengal, India
                    </p>
                </div>

                <div class="mb-4">
                    <h6 class="fw-semibold">
                        📧 Email
                    </h6>

                    <p class="text-muted">
                        support@lawsync.com
                    </p>
                </div>

                <div class="mb-4">
                    <h6 class="fw-semibold">
                        📞 Phone
                    </h6>

                    <p class="text-muted">
                        +91 8910247269
                    </p>
                </div>

                <div>
                    <h6 class="fw-semibold">
                        🕒 Working Hours
                    </h6>

                    <p class="text-muted">
                        Monday - Saturday : 9 AM - 7 PM
                    </p>
                </div>

            </div>

        </div>

    </div>

</div>

@endsection