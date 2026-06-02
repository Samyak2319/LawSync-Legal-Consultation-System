<?php

namespace App\Http\Controllers;

use App\Models\Lawyer;
use App\Models\Booking;
use Illuminate\Http\Request;

class LawyerController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | CREATE PROFILE
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        $existing = Lawyer::where('user_id', auth()->id())->first();

        // If profile already exists → redirect to dashboard
        if ($existing) {
            return redirect()->route('lawyer.dashboard');
        }

        return view('lawyer.create');
    }

    /*
    |--------------------------------------------------------------------------
    | STORE PROFILE
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'specialization' => 'required|string|max:255',
            'bio' => 'required|string',
            'experience' => 'required|string',
            'location' => 'required|string',

            // Certificate Upload
            'certificate' => 'required|file|mimes:pdf,jpg,jpeg,png|max:2048',

            // Profile Picture
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            // Additional Fields
            'bar_registration_number' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'chamber_address' => 'required|string',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Upload Certificate
        |--------------------------------------------------------------------------
        */
        $certificatePath = $request->file('certificate')
            ->store('certificates', 'public');

        /*
        |--------------------------------------------------------------------------
        | Upload Profile Picture
        |--------------------------------------------------------------------------
        */
        $profilePicturePath = null;

        if ($request->hasFile('profile_picture')) {

            $profilePicturePath = $request->file('profile_picture')
                ->store('lawyers', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Create Lawyer Profile
        |--------------------------------------------------------------------------
        */
        Lawyer::create([
            'user_id' => auth()->id(),

            'specialization' => $request->specialization,
            'bio' => $request->bio,
            'experience' => $request->experience,
            'location' => $request->location,

            'certificate' => $certificatePath,
            'profile_picture' => $profilePicturePath,

            'bar_registration_number' => $request->bar_registration_number,
            'qualification' => $request->qualification,
            'chamber_address' => $request->chamber_address,

            // Admin approval pending initially
            'approved' => 0,
        ]);

        /*
        |--------------------------------------------------------------------------
        | Redirect to Dashboard
        |--------------------------------------------------------------------------
        */
        return redirect()->route('lawyer.dashboard')
            ->with('success', 'Profile created successfully. Waiting for admin approval.');
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT PROFILE
    |--------------------------------------------------------------------------
    */
    public function edit()
    {
        $lawyer = Lawyer::where('user_id', auth()->id())->firstOrFail();

        return view('lawyer.edit', compact('lawyer'));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE PROFILE
    |--------------------------------------------------------------------------
    */
    public function update(Request $request)
    {
        $request->validate([
            'specialization' => 'required|string|max:255',
            'bio' => 'required|string',
            'experience' => 'required|string',
            'location' => 'required|string',

            // Optional uploads while editing
            'certificate' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            // Additional fields
            'bar_registration_number' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'chamber_address' => 'required|string',
        ]);

        $lawyer = Lawyer::where('user_id', auth()->id())->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Update Certificate if Uploaded
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('certificate')) {

            $certificatePath = $request->file('certificate')
                ->store('certificates', 'public');

            $lawyer->certificate = $certificatePath;
        }

        /*
        |--------------------------------------------------------------------------
        | Update Profile Picture if Uploaded
        |--------------------------------------------------------------------------
        */
        if ($request->hasFile('profile_picture')) {

            $profilePicturePath = $request->file('profile_picture')
                ->store('lawyers', 'public');

            $lawyer->profile_picture = $profilePicturePath;
        }

        /*
        |--------------------------------------------------------------------------
        | Update Lawyer Data
        |--------------------------------------------------------------------------
        */
        $lawyer->update([
            'specialization' => $request->specialization,
            'bio' => $request->bio,
            'experience' => $request->experience,
            'location' => $request->location,

            'bar_registration_number' => $request->bar_registration_number,
            'qualification' => $request->qualification,
            'chamber_address' => $request->chamber_address,
        ]);

        return redirect()->route('lawyer.dashboard')
            ->with('success', 'Profile updated successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | HOMEPAGE (ONLY APPROVED LAWYERS)
    |--------------------------------------------------------------------------
    */
    public function index(Request $request)
    {
        $query = Lawyer::where('approved', true)
            ->with('user');

        // Search by location
        if ($request->filled('location')) {
            $query->where('location', 'LIKE', '%' . $request->location . '%');
        }

        // Search by specialization
        if ($request->filled('specialization')) {
            $query->where('specialization', 'LIKE', '%' . $request->specialization . '%');
        }

        $lawyers = $query->latest()->get();

        return view('customer.home', compact('lawyers'));
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW LAWYER PROFILE
    |--------------------------------------------------------------------------
    */
    public function show($id)
    {
        $lawyer = Lawyer::with([
            'user',
            'caseHistories',
            'reviews.user',
        ])
        ->where('approved', 1)
        ->findOrFail($id);

        return view('lawyer.show', compact('lawyer'));
    }

    /*
    |--------------------------------------------------------------------------
    | LAWYER DASHBOARD
    |--------------------------------------------------------------------------
    */
    public function dashboard()
    {
        $lawyer = Lawyer::where('user_id', auth()->id())
            ->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Fetch Lawyer Bookings
        |--------------------------------------------------------------------------
        */
        $bookings = Booking::with('user')
            ->where('lawyer_id', $lawyer->id)
            ->latest()
            ->get();

        $caseHistories = $lawyer->caseHistories()->latest()->get();
            return view('lawyer.dashboard', compact(
                'lawyer',
                'bookings',
                'caseHistories'
            ));
    }
}