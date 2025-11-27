<?php

namespace App\Http\Controllers;
use App\Models\Customer;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email|unique:customers,email',
            'phone'      => 'required|string|max:20',
            'customer_type' => 'required|in:Regular,VIP',
        ]);

        // Auto generate ID kalau perlu
        $customerId = 'CUST-' . strtoupper(substr(uniqid(), -6));

        Customer::create([
            'customer_id' => $customerId,
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'customer_type' => $request->customer_type,
        ]);

        return redirect()->route('customers.index')
                        ->with('success', 'Customer created successfully!');
    }


}
