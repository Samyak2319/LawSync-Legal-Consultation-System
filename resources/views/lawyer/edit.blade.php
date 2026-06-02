@extends('layouts.app')
@section('title', 'Edit Lawyer Profile - LawSync')
@section('content')

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow-lg border-0 p-4">

                <h3 class="mb-4 text-warning fw-bold">
                    ✏️ Edit Lawyer Profile
                </h3>

                <form method="POST"
                      action="{{ route('lawyer.update') }}"
                      enctype="multipart/form-data">

                    @csrf

                    <!-- PROFILE PICTURE -->
                    <div class="text-center mb-4">

                        @if($lawyer->profile_picture)
                            <img src="{{ asset('storage/' . $lawyer->profile_picture) }}"
                                 class="rounded-circle shadow-sm mb-3"
                                 style="width:140px;height:140px;object-fit:cover;">
                        @else
                            <img src="https://via.placeholder.com/140"
                                 class="rounded-circle shadow-sm mb-3">
                        @endif

                        <div>
                            <label class="form-label fw-semibold">
                                📷 Update Profile Picture
                            </label>

                            <input type="file"
                                   name="profile_picture"
                                   class="form-control">
                        </div>
                    </div>

                    <!-- SPECIALIZATION -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            ⚖️ Specialization
                        </label>

                        <input type="text"
                               name="specialization"
                               value="{{ $lawyer->specialization }}"
                               class="form-control">
                    </div>

                    <!-- BIO -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            🧾 Bio
                        </label>

                        <textarea name="bio"
                                  class="form-control"
                                  rows="4">{{ $lawyer->bio }}</textarea>
                    </div>

                    <!-- EXPERIENCE -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            💼 Experience
                        </label>

                        <input type="text"
                               name="experience"
                               value="{{ $lawyer->experience }}"
                               class="form-control">
                    </div>

                    <!-- LOCATION -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            📍 Location
                        </label>

                        <input type="text"
                               name="location"
                               value="{{ $lawyer->location }}"
                               class="form-control">
                    </div>

                    <!-- BAR REGISTRATION -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            🪪 BAR Registration Number
                        </label>

                        <input type="text"
                               name="bar_registration_number"
                               value="{{ $lawyer->bar_registration_number }}"
                               class="form-control">
                    </div>

                    <!-- QUALIFICATION -->
                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            🎓 Qualification
                        </label>

                        <input type="text"
                               name="qualification"
                               value="{{ $lawyer->qualification }}"
                               class="form-control">
                    </div>

                    <!-- CHAMBER ADDRESS -->
                    <div class="mb-4">
                        <label class="form-label fw-semibold">
                            🏛️ Chamber Address
                        </label>

                        <textarea name="chamber_address"
                                  class="form-control"
                                  rows="3">{{ $lawyer->chamber_address }}</textarea>
                    </div>

                    <button type="submit"
                            class="btn btn-warning w-100 py-2 fw-semibold">

                        ✅ Update Profile
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection