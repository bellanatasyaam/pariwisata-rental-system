<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::all();
        return view('rentals.index', compact('rentals'));
    }

    public function create()
    {
        $customers = \App\Models\Customer::all();
        $vehicles = \App\Models\Vehicle::all();

        return view('rentals.create', compact('customers', 'vehicles'));
    }

    public function store(Request $request)
    {
        Rental::create($request->all());
        return redirect()->route('rentals.index');
    }

    public function show(Rental $rental)
    {
        return view('rentals.show', compact('rental'));
    }

    public function edit(Rental $rental)
    {
        return view('rentals.edit', compact('rental'));
    }

    public function update(Request $request, Rental $rental)
    {
        $rental->update($request->all());
        return redirect()->route('rentals.index');
    }

    public function destroy(Rental $rental)
    {
        $rental->delete();
        return redirect()->route('rentals.index');
    }
}
