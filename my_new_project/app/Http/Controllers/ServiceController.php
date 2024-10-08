<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service; 

class ServiceController extends Controller
{
    // Display a listing of the services
    public function index()
    {
        $service = Service::all();
        return view('services.index', compact('service'));
    }

    // Show the form for creating a new service
    public function create()
    {
        return view('services.create');
    }

    // Store a newly created service in the database
    public function store(Request $request)
    {
        $service = new Service();
        $service->name = $request->name;  
        $service->save();

        return redirect()->route('services.index');
    }

    // Show the form for an existing service
    public function show(string $id)
    {
        $service = Service::findOrFail($id);
        return view('services.show', compact('service'));
    }

    // Show the form for editing an existing service
    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        return view('services.edit', compact('service'));
    }

    // Update an existing service in the database
    public function update(Request $request, string $id)
    {
        $service = Service::findOrFail($id);
        $service->name = $request->name;
        $service->save();

        return redirect()->route('services.index');
    }

    // Remove a service from the database
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index');
    }
}
