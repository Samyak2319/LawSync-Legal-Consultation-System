@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh;">

    <div class="card shadow-lg border-0 p-4" style="width: 420px; border-radius: 12px;">

        <h3 class="text-center mb-4 fw-bold">Create Account</h3>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Full Name</label>
                <input type="text" name="name" value="{{ old('name') }}" 
                       class="form-control form-control-lg" placeholder="Enter your name" required>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" 
                       class="form-control form-control-lg" placeholder="Enter your email" required>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Role -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Register As</label>
                <select name="role" class="form-select form-select-lg">
                    <option value="customer">Client</option>
                    <option value="lawyer">Lawyer</option>
                </select>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Password</label>
                <input type="password" name="password" 
                       class="form-control form-control-lg" placeholder="Enter password" required>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Confirm Password</label>
                <input type="password" name="password_confirmation" 
                       class="form-control form-control-lg" placeholder="Confirm password" required>
            </div>

            <!-- Button -->
            <button class="btn btn-primary w-100 py-2 fw-semibold">
                Register
            </button>

            <!-- Login Link -->
            <div class="text-center mt-3">
                <small>
                    Already have an account?
                    <a href="{{ route('login') }}" class="fw-semibold text-decoration-none">Login</a>
                </small>
            </div>

        </form>

    </div>

</div>

@endsection