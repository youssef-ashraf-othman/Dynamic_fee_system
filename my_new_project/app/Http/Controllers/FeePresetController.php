<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeePreset; 

class FeePresetController extends Controller
{
    public function index()
    {
        $feePreset = FeePreset::all();
        return view('fee_presets.index', compact('feePreset'));
    }
    // Show the form for creating a new fee preset
    public function create()
    {
        return view('fee_presets.create');
    }
    // Store a newly created fee preset in the database
    public function store(Request $request)
    {
        $feePreset = new FeePreset();
        $feePreset->name = $request->name;  

        return redirect()->route('fee-presets.index');
    }
    // Show the form for an existing fee preset
    public function show(string $id)
    {
        $feePreset = FeePreset::findOrFail($id);
        return view('fee_presets.show', compact('feePreset'));
    }
   // Show the form for editing an existing fee preset
    public function edit(string $id)
    {
        $feePreset = FeePreset::findOrFail($id);
        return view('fee_presets.edit', compact('feePreset'));
    }
    // Update an existing fee preset in the database
    public function update(Request $request, string $id)
    {
        $feePreset = FeePreset::findOrFail($id);
        $feePreset->name = $request->name;
        $feePreset->save();

        return redirect()->route('fee-presets.index');
    }
    // Remove a fee preset from the database
    public function destroy(string $id)
    {
        $feePreset = FeePreset::findOrFail($id);
        $feePreset->delete();

        return redirect()->route('fee-presets.index');
    }
}
