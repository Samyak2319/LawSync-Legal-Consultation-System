@extends('layouts.app')

@section('content')

<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center bg-light py-5">

    <div class="row shadow-lg rounded-4 overflow-hidden bg-white"
         style="max-width: 950px; width:100%;">

        <!-- LEFT SIDE -->
        <div class="col-md-6 bg-primary text-white p-5 d-flex flex-column justify-content-center">

            <h1 class="fw-bold mb-3">
                Create New Password 🔑
            </h1>

            <p class="fs-5 mb-4">
                Your new password should be strong and secure to keep your LawSync account protected.
            </p>

            <ul class="list-unstyled fs-6">
                <li class="mb-3">✅ Secure Password Protection</li>
                <li class="mb-3">✅ Trusted Account Recovery</li>
                <li class="mb-3">✅ Safe Legal Platform Access</li>
                <li class="mb-3">✅ Protected User Information</li>
            </ul>

        </div>

        <!-- RIGHT SIDE -->
        <div class="col-md-6 p-5">

            <div class="text-center mb-4">

                <img src="{{ asset('images/logo.png') }}"
                     width="80"
                     class="mb-3">

                <h2 class="fw-bold">
                    Reset Password
                </h2>

                <p class="text-muted">
                    Enter your new password below
                </p>

            </div>

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

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- TOKEN -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- EMAIL -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        Email Address
                    </label>

                    <input type="email"
                           name="email"
                           value="{{ old('email', $request->email) }}"
                           class="form-control form-control-lg"
                           required autofocus>
                </div>

                <!-- PASSWORD -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">
                        New Password
                    </label>

                    <input type="password"
                           name="password"
                           class="form-control form-control-lg"
                           placeholder="Enter new password"
                           required>
                </div>

                <!-- CONFIRM PASSWORD -->
                <div class="mb-4">
                    <label class="form-label fw-semibold">
                        Confirm Password
                    </label>

                    <input type="password"
                           name="password_confirmation"
                           class="form-control form-control-lg"
                           placeholder="Confirm new password"
                           required>
                </div>

                <!-- BUTTON -->
                <button type="submit"
                        class="btn btn-primary btn-lg w-100">
                    Reset Password
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