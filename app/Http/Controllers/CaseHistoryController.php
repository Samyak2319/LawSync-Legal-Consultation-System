<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaseHistory;
use App\Models\Lawyer;

class CaseHistoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'case_description' => 'required|string|max:255',
            'filing_date' => 'nullable|date',
            'registration_date' => 'nullable|date',
            'hearing_date' => 'nullable|date',
            'status' => 'required',
        ]);

        $lawyer = Lawyer::where('user_id', auth()->id())->firstOrFail();

        CaseHistory::create([
            'lawyer_id' => $lawyer->id,
            'case_description' => $request->case_description,
            'filing_date' => $request->filing_date,
            'registration_date' => $request->registration_date,
            'hearing_date' => $request->hearing_date,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Case history added successfully.');
    }
}