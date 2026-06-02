<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lawyer;
use App\Models\Booking;

class AdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */
    public function dashboard()
    {
        $bookingStats = [
            'pending' => Booking::where('status', 'pending')->count(),
            'accepted' => Booking::where('status', 'accepted')->count(),
            'rejected' => Booking::where('status', 'rejected')->count(),
        ];

        return view('admin.dashboard', [
            'totalUsers' => User::count(),
            'totalLawyers' => Lawyer::count(),
            'pendingLawyers' => Lawyer::where('approved', 0)->count(),
            'totalBookings' => Booking::count(),
            'bookingStats' => $bookingStats
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | USERS
    |--------------------------------------------------------------------------
    */
    public function users()
    {
        $users = User::latest()->get();
        return view('admin.users', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'admin') {
            return back()->with('error', 'Cannot delete admin');
        }

        $user->delete();

        return redirect()->route('admin.users')
            ->with('success', 'User deleted successfully');
    }

    /*
    |--------------------------------------------------------------------------
    | LAWYERS
    |--------------------------------------------------------------------------
    */
    public function lawyers()
    {
        $lawyers = Lawyer::with('user')->latest()->get();
        return view('admin.lawyers', compact('lawyers'));
    }

    public function approveLawyer($id)
    {
        $lawyer = Lawyer::findOrFail($id);

        $lawyer->update([
            'approved' => true
        ]);

        return redirect()->route('admin.lawyers')
            ->with('success', 'Lawyer approved successfully');
    }

    public function deleteLawyer($id)
    {
        $lawyer = Lawyer::findOrFail($id);

        $lawyer->delete();

        return redirect()->route('admin.lawyers')
            ->with('success', 'Lawyer removed successfully');
    }

    public function showLawyer($id)
    {
        $lawyer = Lawyer::with('user')->findOrFail($id);
        return view('admin.lawyer-show', compact('lawyer'));
    }

    /*
    |--------------------------------------------------------------------------
    | BOOKINGS
    |--------------------------------------------------------------------------
    */
    public function bookings()
    {
        $bookings = Booking::with(['user', 'lawyer'])->latest()->get();
        return view('admin.bookings', compact('bookings'));
    }

    public function cancelBooking($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->delete();

        return redirect()->route('admin.bookings')
            ->with('success', 'Booking cancelled successfully');
    }
}