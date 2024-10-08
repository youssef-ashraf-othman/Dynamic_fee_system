<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeePercentage;
use App\Models\FeePreset;
use App\Models\Service;
use App\Models\Threshold;

class FeePercentageController extends Controller
{
    // Display a listing of the fee percentages
    public function index()
    {
        // Searching for the latest record to display it
        $lastFeePercentage = FeePercentage::with(['feePreset', 'service', 'threshold'])
                                ->orderBy('id', 'desc')
                                ->first();

        // Initialize amount
        $calculatedAmount = null;

        // Calculate the fee amount if lastFeePercentage and its threshold exist
        if ($lastFeePercentage && $lastFeePercentage->threshold) {
            $thresholdAmount = $lastFeePercentage->threshold->amount; // Get the threshold amount
            $percentage = $lastFeePercentage->percentage; // Get the percentage

            // Calculate the fee amount based on the percentage of the threshold
            $calculatedAmount = ($thresholdAmount * $percentage) / 100; 
        }

        // Pass only the last fee percentage and calculated amount to the view
        return view('fee_percentages.index', compact('lastFeePercentage', 'calculatedAmount'));
    }

    // Show the form for creating a new fee percentage
    public function create()
    {
        $feePresets = FeePreset::all();
        $services = Service::all();
        $thresholds = Threshold::all();

        return view('fee_percentages.create', compact('feePresets', 'services', 'thresholds'));
    }

    // Store a newly created fee percentage in the database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'fee_preset_id' => 'required|exists:fee_presets,id',
            'service_id' => 'required|exists:services,id',
            'threshold_amount' => 'required|numeric|min:0',  // Validate the input as a number
        ]);

        // Get the threshold based on the amount entered by the user
        $threshold = Threshold::where('amount', '<=', $validatedData['threshold_amount'])
                            ->orderBy('amount', 'desc')
                            ->first();

        if (!$threshold) {
            return back()->withErrors(['threshold_amount' => 'No matching threshold found for the entered amount.']);
        }

        // Calculate the fee percentage based on the selected preset, service, and threshold
        $percentage = $this->calculatePercentage($validatedData['fee_preset_id'], $validatedData['service_id'], $threshold->id);

        // Store the fee percentage in the database
        $feePercentage = new FeePercentage();
        $feePercentage->fee_preset_id = $validatedData['fee_preset_id'];
        $feePercentage->service_id = $validatedData['service_id'];
        $feePercentage->threshold_id = $threshold->id;  // Use the determined threshold
        $feePercentage->percentage = $percentage;
        $feePercentage->save();

        return redirect()->route('fee_percentages.index');
    }

    protected function calculatePercentage($feePresetId, $serviceId, $thresholdId)
    {
    // Using a config array for percentages instead of hardcoding.
        $percentages = [
            '1-1-1' => 5,
            '1-1-2' => 4,
            '1-2-1' => 3,
            '1-2-2' => 2,
            '2-1-1' => 6,
            '2-1-2' => 5,
            '2-2-1' => 4,
            '2-2-2' => 3,
        ];

        return $percentages["{$feePresetId}-{$serviceId}-{$thresholdId}"] ?? 0;
    }


    // Show the form for editing an existing fee percentage
    public function edit($id)
    {
        $feePercentage = FeePercentage::findOrFail($id);
        $feePresets = FeePreset::all();
        $services = Service::all();
        $thresholds = Threshold::all();

        return view('fee_percentages.edit', compact('feePercentage', 'feePresets', 'services', 'thresholds'));
    }

    // Update an existing fee percentage in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'fee_preset_id' => 'required|exists:fee_presets,id',
            'service_id' => 'required|exists:services,id',
            'threshold_id' => 'required|exists:thresholds,id',
        ]);

        $feePercentage = FeePercentage::findOrFail($id);
        $feePercentage->fee_preset_id = $request->fee_preset_id;
        $feePercentage->service_id = $request->service_id;
        $feePercentage->threshold_id = $request->threshold_id;
        $feePercentage->percentage = $this->calculatePercentage($request->fee_preset_id, $request->service_id, $request->threshold_id);
        $feePercentage->save();

        return redirect()->route('fee_percentages.index');
    }

    // Remove a fee percentage from the database
    public function destroy($id)
    {
        $feePercentage = FeePercentage::findOrFail($id);
        $feePercentage->delete();

        return redirect()->route('fee_percentages.index');
    }
    
}
