@extends('layouts.app')

@section('content')

<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center bg-light py-5">

    <div class="row shadow-lg rounded-4 overflow-hidden bg-white" style="max-width: 1000px; width:100%;">

        <!-- LEFT SIDE -->
        <div class="col-md-6 bg-primary text-white p-5 d-flex flex-column justify-content-center">

            <h1 class="fw-bold mb-3">
                Welcome Back to LawSync ⚖️
            </h1>

            <p class="mb-4 fs-5">
                Connect with trusted lawyers, manage appointments, and access legal services securely.
            </p>

            <ul class="list-unstyled fs-6">
                <li class="mb-3">✅ Trusted Legal Professionals</li>
                <li class="mb-3">✅ Secure Appointment Booking</li>
                <li class="mb-3">✅ Online & Offline Consultations</li>
                <li class="mb-3">✅ Professional Legal Assistance</li>
            </ul>

        </div>

        <!-- RIGHT SIDE -->
        <div class="col-md-6 p-5">

            <div class="text-center mb-4">
                <img src="{{ asset('images/logo.png') }}" width="80" class="mb-3">
                <h2 class="fw-bold">Login</h2>
                <p class="text-muted">
                    Access your LawSync account
                </p>
            </div>

            <!-- SESSION STATUS -->
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <!-- VALIDATION ERRORS -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- EMAIL -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Email Address
                    </label>

                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="form-control form-control-lg"
                           placeholder="Enter your email"
                           required autofocus>
                </div>

                <!-- PASSWORD -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Password
                    </label>

                    <input type="password"
                           name="password"
                           class="form-control form-control-lg"
                           placeholder="Enter your password"
                           required>
                </div>

                <!-- REMEMBER -->
                <div class="form-check mb-4">
                    <input class="form-check-input"
                           type="checkbox"
                           name="remember"
                           id="remember_me">

                    <label class="form-check-label" for="remember_me">
                        Remember Me
                    </label>
                </div>

                <!-- BUTTON -->
                <button type="submit"
                        class="btn btn-primary btn-lg w-100 mb-3">
                    Login
                </button>

                <!-- LINKS -->
                <div class="d-flex justify-content-between">

                    @if (Route::has('password.request'))
                        <a class="text-decoration-none"
                           href="{{ route('password.request') }}">
                            Forgot Password?
                        </a>
                    @endif

                    <a href="{{ route('register') }}"
                       class="text-decoration-none">
                        Create Account
                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection