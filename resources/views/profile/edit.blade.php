@extends('layouts.app')

@section('content')

<div class="container mt-5" style="max-width:750px;">

    <h3 class="mb-4 fw-bold">My Profile</h3>

    @if(session('status') === 'profile-updated')
        <div class="alert alert-success">
            Profile updated successfully!
        </div>
    @endif

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <!-- PROFILE IMAGE -->
                <div class="text-center mb-4">
                    <img 
                        src="{{ auth()->user()->profile_photo 
                            ? asset('storage/' . auth()->user()->profile_photo) 
                            : 'https://via.placeholder.com/120' }}"
                        class="rounded-circle shadow"
                        width="120" height="120"
                        style="object-fit: cover;"
                    >

                    <input type="file" name="profile_photo" class="form-control mt-3">
                </div>

                <!-- NAME -->
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control"
                        value="{{ old('name', auth()->user()->name) }}" required>
                </div>

                <!-- EMAIL -->
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control"
                        value="{{ old('email', auth()->user()->email) }}" required>
                </div>

                <!-- PHONE -->
                <div class="mb-3">
                    <label class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control"
                        value="{{ old('phone', auth()->user()->phone) }}">
                </div>

                <!-- ADDRESS -->
                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control" rows="3">{{ old('address', auth()->user()->address) }}</textarea>
                </div>

                <button class="btn btn-primary w-100">
                    Save Changes
                </button>

            </form>

        </div>
    </div>

    <!-- PASSWORD -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">

            <h5 class="mb-3">Change Password</h5>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('PUT')

                <input type="password" name="current_password" class="form-control mb-2" placeholder="Current Password" required>
                <input type="password" name="password" class="form-control mb-2" placeholder="New Password" required>
                <input type="password" name="password_confirmation" class="form-control mb-3" placeholder="Confirm Password" required>

                <button class="btn btn-warning w-100">
                    Update Password
                </button>

            </form>

        </div>
    </div>

    <!-- DELETE -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <h5 class="text-danger mb-3">Delete Account</h5>

            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('DELETE')

                <input type="password" name="password" class="form-control mb-3" placeholder="Confirm Password" required>

                <button class="btn btn-danger w-100">
                    Delete Account
                </button>
            </form>

        </div>
    </div>

</div>

@endsection