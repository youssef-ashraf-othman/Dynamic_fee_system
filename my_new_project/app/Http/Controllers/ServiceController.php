<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\FeePreset;

class ServiceController extends Controller
{
    // Display a listing of the services
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    // Show the form for creating a new service
    public function create()
    {
        // Get all fee presets to display in the dropdown
        $feePresets = FeePreset::all();
        return view('services.create', compact('feePresets'));
    }

    // Store a newly created service in the database
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'fee_preset_id' => 'required|exists:fee_presets,id',
            'percentage' => 'nullable|numeric|min:0|max:100',
        ]);

        $service = Service::create([
            'name' => $request->name,
            'fee_preset_id' => $request->fee_preset_id,
            'percentage' => $request->percentage,
        ]);

        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }
    // Display the specified service
    public function show(string $id)
    {
        $service = Service::findOrFail($id);
        return view('services.show', compact('service'));
    }

    // Show the form for editing the specified service
    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        $feePresets = FeePreset::all();
        return view('services.edit', compact('service', 'feePresets'));
    }

    // Update the specified service in the database
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'fee_preset_id' => 'required|exists:fee_presets,id',
            'percentage' => 'required|numeric|min:0|max:100',
        ]);

        $service = Service::findOrFail($id);
        $service->update([
            'name' => $request->name,
            'fee_preset_id' => $request->fee_preset_id,
            'percentage' => $request->percentage,
        ]);

        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    // Remove the specified service from the database
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}
