<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Customer;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // Menampilkan semua data booking
    public function index()
    {
        $reservations = Reservation::with(['customer', 'vehicle'])->latest()->get();
        return view('reservations.index', compact('reservations'));
    }

    // Form tambah data
    public function create()
    {
        $customers = Customer::all();
        $vehicles = Vehicle::all();
        return view('reservations.create', compact('customers', 'vehicles'));
    }

    // Simpan data
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'vehicle_id'  => 'required|exists:vehicles,id',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'total_price' => 'required|numeric',
            'status'      => 'required|string',
        ]);

        Reservation::create($request->all());

        return redirect()->route('reservations.index')
            ->with('success', 'Reservation created successfully.');
    }

    // Form edit data
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $customers = Customer::all();
        $vehicles  = Vehicle::all();

        return view('reservations.edit', compact('reservation', 'customers', 'vehicles'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'vehicle_id'  => 'required|exists:vehicles,id',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'total_price' => 'required|numeric',
            'status'      => 'required|string',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());

        return redirect()->route('reservations.index')
            ->with('success', 'Reservation updated successfully.');
    }

    // Hapus data
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('reservations.index')
            ->with('success', 'Reservation deleted successfully.');
    }
}
