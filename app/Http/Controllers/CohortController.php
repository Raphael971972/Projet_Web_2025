<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class CohortController extends Controller
{
    /**
     * Display all cohorts
     */
    public function index() {
        $cohorts = Cohort::all();
        return view('pages.cohorts.index', compact('cohorts'));
    }

    /**
     * Store a new cohort
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'start_year' => 'required|date',
            'end_year' => 'required|date',
        ]);

        Cohort::create([
            'school_id' => 1, // hardcoded for now
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_year,
            'end_date' => $request->end_year,
        ]);

        return redirect()->back()->with('success', 'Cohort successfully added.');
    }

    /**
     * Delete a specific cohort
     */
    public function destroy($id)
    {
        Cohort::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Cohort successfully deleted.');
    }

    /**
     * Return the data of a specific cohort as JSON
     */
    public function edit($id)
    {
        $cohort = Cohort::findOrFail($id);
        return response()->json($cohort);
    }

    /**
     * Update a specific cohort
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'start_year' => 'required|date',
            'end_year' => 'required|date',
        ]);

        $cohort = Cohort::findOrFail($id);
        $cohort->update([
            'name' => $request->name,
            'description' => $request->description,
            'start_date' => $request->start_year,
            'end_date' => $request->end_year,
        ]);

        return redirect()->route('cohort.index')->with('success', 'Cohort successfully updated.');
    }

    /**
     * Show the details of a specific cohort
     */
    public function show(Cohort $cohort) {
        return view('pages.cohorts.show', [
            'cohort' => $cohort
        ]);
    }
}
