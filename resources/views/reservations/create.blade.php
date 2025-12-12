@extends('layouts.app')

@section('title', 'Add New Reservation')

@section('content')

<div class="max-w-3xl mx-auto px-6 py-10">

    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">

        {{-- Title --}}
        <h2 class="text-3xl font-bold text-gray-900 mb-1">
            Add New Reservation
        </h2>
        <p class="text-gray-500 mb-8">
            Isi data reservasi kendaraan dengan lengkap dan benar
        </p>

        {{-- Form --}}
        <form action="{{ route('reservations.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- Customer ID --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Customer</label>
                <select name="customer_id"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    required>
                    <option value="">-- Pilih Customer --</option>

                    @foreach($customers as $cust)
                        <option value="{{ $cust->customer_id }}">
                            {{ $cust->first_name }} {{ $cust->last_name }} (ID: {{ $cust->customer_id }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Vehicle ID --}}
            <select name="vehicle_id"
                class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                required>
                <option value="">-- Pilih Kendaraan --</option>

                @foreach($vehicles as $veh)
                    <option value="{{ $veh->vehicle_id }}">
                        {{ $veh->brand }} {{ $veh->model }} ({{ $veh->vehicle_id }})
                    </option>
                @endforeach
            </select>

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

            {{-- Status --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Status</label>
                <select name="status"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    required>
                    <option value="Pending">Pending</option>
                    <option value="Confirmed">Confirmed</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>

            {{-- Submit --}}
            <div class="flex justify-end pt-4">
                <button type="submit"
                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl shadow-md transition">
                    Save Reservation
                </button>

                <a href="{{ route('reservations.index') }}"
                    class="ml-4 px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium rounded-xl shadow-md transition">
                    Cancel
                </a>
            </div>

        </form>

    </div>

</div>

@endsection
