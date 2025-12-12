@extends('layouts.app')

@section('title', 'Add New Rental')

@section('content')

<div class="max-w-3xl mx-auto px-6 py-10">

    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">

        {{-- Title --}}
        <h2 class="text-3xl font-bold text-gray-900 mb-1">
            Add New Rental
        </h2>
        <p class="text-gray-500 mb-8">
            Isi data rental kendaraan dengan lengkap dan benar
        </p>

        {{-- Form --}}
        <form action="{{ route('rentals.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Customer --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Customer</label>
                <select name="customer_id"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    required>
                    <option value="">-- Select Customer --</option>
                    @foreach ($customers as $customer)
                        <option value="{{ $customer->customer_id }}">
                            {{ $customer->first_name }} {{ $customer->last_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Vehicle --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Vehicle</label>
                <select name="vehicle_id"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    required>
                    <option value="">-- Select Vehicle --</option>
                    @foreach ($vehicles as $vehicle)
                        <option value="{{ $vehicle->vehicle_id }}">
                            {{ $vehicle->brand }} - {{ $vehicle->model }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Start Date --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Start Date</label>
                <input type="date" name="start_date"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    required>
            </div>

            {{-- End Date --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">End Date</label>
                <input type="date" name="end_date"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    required>
            </div>

            {{-- Base Cost --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Base Cost</label>
                <input type="number" name="base_cost"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    placeholder="e.g. 150000" required>
            </div>

            {{-- Total Amount --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Total Amount</label>
                <input type="number" name="total_amount"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    placeholder="e.g. 200000" required>
            </div>

            {{-- Status --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Status</label>
                <select name="status"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    required>
                    <option value="">-- Select Status --</option>
                    <option value="pending">Pending</option>
                    <option value="active">Active</option>
                    <option value="completed">Completed</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>

            {{-- Pickup Location --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Pickup Location</label>
                <input type="text" name="pickup_location"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    placeholder="Enter pickup location" required>
            </div>

            {{-- Submit --}}
            <div class="flex justify-end pt-4">
                <button type="submit"
                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl shadow-md transition">
                    Save Rental
                </button>

                <a href="{{ route('rentals.index') }}"
                    class="ml-4 px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium rounded-xl shadow-md transition">
                    Cancel
                </a>
            </div>

        </form>

    </div>

</div>

@endsection
