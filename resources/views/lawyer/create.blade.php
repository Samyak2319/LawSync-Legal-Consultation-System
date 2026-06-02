@extends('layouts.app')
@section('title', 'Create Lawyer Profile - LawSync')
@section('content')

<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h3 class="mb-4 text-primary">Create Lawyer Profile</h3>

        <form method="POST" action="{{ route('lawyer.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">Specialization</label>
                <input type="text" name="specialization" class="form-control" placeholder="e.g. Criminal Lawyer">
            </div>

            <div class="mb-3">
                <label class="form-label">Bio</label>
                <textarea name="bio" class="form-control" rows="4" placeholder="Write about yourself"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Profile Picture</label>
                <input type="file" name="profile_picture" class="form-control">
            </div>


            <div class="mb-3">
                <label class="form-label">BAR Registration Number</label>
                <input type="text"
                    name="bar_registration_number"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Qualification</label>
                <input type="text"
                    name="qualification"
                    class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Chamber Address</label>
                <textarea name="chamber_address"
                        class="form-control"
                        rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Experience</label>
                <input type="text" name="experience" class="form-control" placeholder="e.g. 5 years">
            </div>

            <div class="mb-3">
                <label class="form-label">Location</label>
                <input type="text" name="location" class="form-control" placeholder="e.g. Kolkata">
            </div>

            <div class="mb-3">
                <label class="form-label">Upload Certificate (BCI CoP)</label>
                <input type="file" name="certificate" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">
                Save Profile
            </button>
        </form>
    </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>


@endsection