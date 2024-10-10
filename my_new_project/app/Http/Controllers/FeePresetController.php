<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeePreset; 
use App\Models\Threshold; 

class FeePresetController extends Controller
{
    public function index()
    {
        $feePreset = FeePreset::with('thresholds')->get();
        $presets = FeePreset::with('services')->get();
        return view('fee_presets.index', compact('feePreset','presets'));
    }


    // Show the form for creating a new fee preset
    public function create()
    {
        return view('fee_presets.create');
    }


    // Store a newly created fee preset in the database
    public function store(Request $request)
    {
    $preset = FeePreset::create([
        'name' => $request->name,
        // Add other preset fields if necessary
    ]);

    // Loop through the threshold inputs and create them
    $min_values = $request->threshold_min;
    $max_values = $request->threshold_max;
    $fee_percentages = $request->threshold_fee;

    for ($i = 0; $i < count($min_values); $i++) {
        Threshold::create([
            'preset_id' => $preset->id,
            'min_value' => $min_values[$i],
            'max_value' => $max_values[$i],
            'fee_percentage' => $fee_percentages[$i],
        ]);
    }

    return redirect()->route('fee_presets.index')->with('success', 'Preset created successfully with thresholds.');
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
        $feePreset = FeePreset::with('thresholds')->findOrFail($id);
        return view('fee_presets.edit', compact('feePreset'));
    }
    // Update an existing fee preset in the database
    public function update(Request $request, $id)
    {
        // Validate the preset name and threshold inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'threshold_min.*' => 'required|numeric',
            'threshold_max.*' => 'required|numeric',
            'threshold_fee.*' => 'required|numeric',
        ]);

        // Find the fee preset
        $feePreset = FeePreset::findOrFail($id);
        
        // Update the fee preset name
        $feePreset->name = $request->name;
        $feePreset->save();

        // Get the existing threshold IDs from the request
        $existingThresholdIds = $request->input('threshold_ids', []);

        // Get the existing thresholds for this preset
        $existingThresholds = Threshold::where('preset_id', $feePreset->id)->pluck('id')->toArray();

        // Loop through all submitted thresholds and update or create them
        foreach ($request->threshold_min as $index => $min) {
            $max = $request->threshold_max[$index];
            $fee = $request->threshold_fee[$index];

            if (isset($existingThresholdIds[$index])) {
                // If the threshold ID exists, update the existing threshold
                $threshold = Threshold::find($existingThresholdIds[$index]);
                if ($threshold) {
                    $threshold->min_value = $min;
                    $threshold->max_value = $max;
                    $threshold->fee_percentage = $fee;
                    $threshold->save();
                }
            } else {
                // If there's no threshold ID, create a new one
                Threshold::create([
                    'preset_id' => $feePreset->id,
                    'min_value' => $min,
                    'max_value' => $max,
                    'fee_percentage' => $fee,
                ]);
            }
        }

        // Delete any thresholds that were removed in the form (i.e., not in the request anymore)
        foreach ($existingThresholds as $existingId) {
            if (!in_array($existingId, $existingThresholdIds)) {
                Threshold::find($existingId)->delete();
            }
        }

        return redirect()->route('fee-presets.index')->with('success', 'Preset updated successfully.');
    }
    // Remove a fee preset from the database
    public function destroy(string $id)
    {
        $feePreset = FeePreset::findOrFail($id);
        $feePreset->delete();

        return redirect()->route('fee_presets.index');
    }
}
