<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    // INDEX
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    // CREATE
    public function create()
    {
        return view('vehicles.create');
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'make' => 'required',
            'model' => 'required',
            'category' => 'required',
            'license_plate' => 'required|unique:vehicles',
            'daily_rate' => 'required|numeric',
            'status' => 'required',
            'location' => 'required',
            'mileage' => 'required|numeric',
            'last_maintenance' => 'nullable|date',
        ]);

        Vehicle::create($request->all());

        return redirect()->route('vehicles.index')
            ->with('success', 'Vehicle added successfully.');
    }

    // SHOW
    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    // EDIT
    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    // UPDATE
    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate([
            'make' => 'required',
            'model' => 'required',
            'category' => 'required',
            'license_plate' => "required|unique:vehicles,license_plate,$vehicle->vehicle_id,vehicle_id",
            'daily_rate' => 'required|numeric',
            'status' => 'required',
            'location' => 'required',
            'mileage' => 'required|numeric',
            'last_maintenance' => 'nullable|date',
        ]);

        $vehicle->update($request->all());

        return redirect()->route('vehicles.index')
            ->with('success', 'Vehicle updated successfully.');
    }

    // DELETE
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()->route('vehicles.index')
            ->with('success', 'Vehicle deleted successfully.');
    }
}
