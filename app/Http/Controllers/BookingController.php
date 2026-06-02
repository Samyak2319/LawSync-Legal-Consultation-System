<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Booking;

class BookingController extends Controller
{


    // public function store($lawyerId)
    // {
    //     $existing = Booking::where('user_id', auth()->id())
    //         ->where('lawyer_id', $lawyerId)
    //         ->first();

    //     if ($existing) {
    //         return back()->with('error', 'You already requested this lawyer.');
    //     }

    //     Booking::create([
    //         'user_id' => auth()->id(),
    //         'lawyer_id' => $lawyerId,
    //         'status' => 'pending',
    //     ]);

    //     return back()->with('success', 'Appointment request sent!');
    // }

    public function store(Request $request, $lawyerId)
    {
        $request->validate([
            'appointment_type' => 'required|string',
            'description' => 'required|string|max:1000',
        ]);

        Booking::create([
            'user_id' => auth()->id(),
            'lawyer_id' => $lawyerId,
            'appointment_type' => $request->appointment_type,
            'description' => $request->description,
            'status' => 'pending',
        ]);

        return redirect()->back()->with(
            'success',
            '✅  Appointment request sent! Please wait for the lawyer to accept.'
        );
    }

    public function lawyerBookings()
    {
        $lawyer = auth()->user()->lawyer;

        if (!$lawyer) {
            return redirect()->route('lawyer.create')
                ->with('error', 'Please create your profile first.');
        }

        $bookings = Booking::with('user')
            ->where('lawyer_id', $lawyer->id)
            ->latest()
            ->get();

        return view('lawyer.dashboard', compact('bookings', 'lawyer'));
    }
    public function accept($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'accepted']);

        return back();
    }

    public function reject($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'rejected']);

        return back();
    }
    public function customerBookings()
    {
        $bookings = \App\Models\Booking::with('lawyer')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('customer.bookings', compact('bookings'));
    }
}