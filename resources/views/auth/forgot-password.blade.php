@extends('layouts.app')

@section('content')

<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center bg-light py-5">

    <div class="row shadow-lg rounded-4 overflow-hidden bg-white"
         style="max-width: 950px; width:100%;">

        <!-- LEFT SIDE -->
        <div class="col-md-6 bg-primary text-white p-5 d-flex flex-column justify-content-center">

            <h1 class="fw-bold mb-3">
                Reset Your Password 🔐
            </h1>

            <p class="fs-5 mb-4">
                Don't worry. Enter your registered email address and we'll send you a secure password reset link.
            </p>

            <ul class="list-unstyled fs-6">
                <li class="mb-3">✅ Secure Password Recovery</li>
                <li class="mb-3">✅ Fast Email Verification</li>
                <li class="mb-3">✅ Protected Account Access</li>
                <li class="mb-3">✅ Trusted LawSync Security</li>
            </ul>

        </div>

        <!-- RIGHT SIDE -->
        <div class="col-md-6 p-5">

            <div class="text-center mb-4">
                <img src="{{ asset('images/logo.png') }}"
                     width="80"
                     class="mb-3">

                <h2 class="fw-bold">
                    Forgot Password?
                </h2>

                <p class="text-muted">
                    We'll email you a reset link
                </p>
            </div>

            <!-- SESSION STATUS -->
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <!-- ERRORS -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- EMAIL -->
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        Email Address
                    </label>

                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="form-control form-control-lg"
                           placeholder="Enter your registered email"
                           required autofocus>
                </div>

                <!-- BUTTON -->
                <button type="submit"
                        class="btn btn-primary btn-lg w-100">
                    Send Password Reset Link
                </button>

            </form>

            <!-- BACK -->
            <div class="text-center mt-4">
                <a href="{{ route('login') }}"
                   class="text-decoration-none">
                    ← Back to Login
                </a>
            </div>

        </div>

    </div>

</div>

@endsection