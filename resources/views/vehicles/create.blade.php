@extends('layouts.app')

@section('title', 'Add New Vehicle')

@section('content')

<div class="max-w-3xl mx-auto px-6 py-10">

    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">

        <h2 class="text-3xl font-bold text-gray-900 mb-1">
            Add New Vehicle
        </h2>
        <p class="text-gray-500 mb-8">
            Isi data kendaraan dengan lengkap dan benar
        </p>

        <form action="{{ route('vehicles.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-gray-700 font-medium mb-1">Make</label>
                <input type="text" name="make"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    placeholder="Toyota, Honda, Suzuki..." required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Model</label>
                <input type="text" name="model"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    placeholder="Avanza, Jazz, Carry..." required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Category</label>
                <input type="text" name="category"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    placeholder="SUV, MPV, Sedan..." required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">License Plate</label>
                <input type="text" name="license_plate"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    placeholder="B 1234 CD" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Daily Rate (Rp)</label>
                <input type="number" name="daily_rate"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    placeholder="200000" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Status</label>
                <select name="status"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    required>
                    <option value="">-- Select Status --</option>
                    <option value="Available">Available</option>
                    <option value="Rented">Rented</option>
                    <option value="Maintenance">Maintenance</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Location</label>
                <input type="text" name="location"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    placeholder="Jakarta, Bandung, etc." required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Mileage</label>
                <input type="number" name="mileage"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    placeholder="50000" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Last Maintenance</label>
                <input type="date" name="last_maintenance"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition">
            </div>

            <div class="flex justify-end pt-4">
                <button type="submit"
                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl shadow-md transition">
                    Save Vehicle
                </button>

                <a href="{{ route('vehicles.index') }}"
                    class="ml-4 px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium rounded-xl shadow-md transition">
                    Cancel
                </a>
            </div>

        </form>

    </div>

</div>

@endsection
