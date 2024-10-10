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
    public function index(Request $request)
    {
        // Searching for the latest record to display it
        $lastFeePercentage = FeePercentage::with(['feePreset', 'service', 'threshold'])
                                    ->orderBy('id', 'desc')
                                    ->first();
    
        // Initialize amounts
        $calculatedAmount = $request->get('calculated_amount', null);
        $thresholdAmount = $request->get('threshold_amount', null);
    
        // Calculate the fee amount if lastFeePercentage and its threshold exist
        if ($lastFeePercentage && $lastFeePercentage->threshold) {
            // Fetch the percentage from both threshold and service
            $thresholdPercentage = $lastFeePercentage->threshold->fee_percentage; // Get the percentage from threshold
            $servicePercentage = $lastFeePercentage->service->percentage; // Get the percentage from service
    
            // Calculate the average percentage
            $averagePercentage = ($thresholdPercentage + $servicePercentage) / 2;
    
            // Calculate the fee amount based on the average percentage of the entered threshold amount
            $calculatedAmount = ($thresholdAmount * $averagePercentage) / 100; 
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
    
        // Get the thresholds for the selected preset
        $thresholds = Threshold::where('preset_id', $validatedData['fee_preset_id'])
                                ->get();
    
        // Check if the entered amount falls within any of the defined thresholds
        $threshold = $thresholds->first(function ($threshold) use ($validatedData) {
            return $validatedData['threshold_amount'] >= $threshold->min_value && $validatedData['threshold_amount'] <= $threshold->max_value;
        });
    
        if (!$threshold) {
            return back()->withErrors(['threshold_amount' => 'The entered amount does not fall within the defined thresholds for this fee preset.'])
                         ->withInput();
        }
    
        // Calculate the fee percentage from the threshold directly
        $percentage = $threshold->fee_percentage;
    
        // Store the fee percentage in the database
        $feePercentage = new FeePercentage();
        $feePercentage->fee_preset_id = $validatedData['fee_preset_id'];
        $feePercentage->service_id = $validatedData['service_id'];
        $feePercentage->threshold_id = $threshold->id;  // Use the determined threshold
        $feePercentage->percentage = $percentage;
        $feePercentage->save();
    
        // Redirect to index with the entered amount and calculated fee
        $calculatedAmount = ($validatedData['threshold_amount'] * $percentage) / 100;
    
        return redirect()->route('fee_percentages.index', [
            'threshold_amount' => $validatedData['threshold_amount'],
            'calculated_amount' => $calculatedAmount,
        ]);
    }
    

    public function getServices($presetId)
    {
        // Fetch services associated with the fee preset
        $services = Service::where('fee_preset_id', $presetId)->get();

        return response()->json(['services' => $services]); 
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

    protected function calculatePercentage($feePresetId, $serviceId, $thresholdId)
{
    // Fetch percentage from Threshold table for the preset, service, and threshold
    $threshold = Threshold::where('id', $thresholdId)
                          ->where('preset_id', $feePresetId)
                          ->first();

    // Fetch percentage from Service table for the service
    $service = Service::find($serviceId);

    // Initialize the percentages
    $thresholdPercentage = $threshold ? $threshold->fee_percentage : 0;
    $servicePercentage = $service ? $service->fee_percentage : 0;

    // Calculate the average percentage
    $averagePercentage = ($thresholdPercentage + $servicePercentage) / 2;

    return $averagePercentage;
    }


    // Remove a fee percentage from the database
    public function destroy($id)
    {
        $feePercentage = FeePercentage::findOrFail($id);
        $feePercentage->delete();

        return redirect()->route('fee_percentages.index');
    }
    
}
