<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Threshold; 

class ThresholdController extends Controller
{
    // Display a listing of the thresholds
    public function index()
    {
        $threshold = Threshold::all();
        return view('thresholds.index', compact('threshold')); 
    }

    // Show the form for creating a new threshold
    public function create()
    {
        return view('thresholds.create');
    }

    // Store a newly created threshold in the database
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',  
        ]);

        $threshold = new Threshold();
        $threshold->amount = $request->input('amount');  
        $threshold->save();

        return redirect()->route('thresholds.index');
    }

    // Show the form for an existing threshold
    public function show(string $id)
    {
        $threshold = Threshold::findOrFail($id);
        return view('thresholds.show', compact('threshold'));
    }

    // Show the form for editing an existing threshold
    public function edit(string $id)
    {
        $threshold = Threshold::findOrFail($id);
        return view('thresholds.edit', compact('threshold'));
    }

    // Update an existing threshold in the database
    public function update(Request $request, string $id)
    {
        $request->validate([
            'amount' => 'required|numeric',  
        ]);

        $threshold = Threshold::findOrFail($id);
        $threshold->amount = $request->input('amount');  
        $threshold->save();

        return redirect()->route('thresholds.index');
    }

    // Remove a threshold from the database
    public function destroy(string $id)
    {
        $threshold = Threshold::findOrFail($id);
        $threshold->delete();

        return redirect()->route('thresholds.index');
    }
}
