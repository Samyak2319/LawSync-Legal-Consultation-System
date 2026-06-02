<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Lawyer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $lawyerId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        // CHECK IF USER ALREADY REVIEWED
        $existingReview = Review::where('user_id', Auth::id())
            ->where('lawyer_id', $lawyerId)
            ->first();

        if ($existingReview) {
            return back()->with('error', 'You already reviewed this lawyer.');
        }

        Review::create([
            'user_id' => Auth::id(),
            'lawyer_id' => $lawyerId,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Review submitted successfully.');
    }
}
