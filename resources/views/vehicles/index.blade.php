@extends('layouts.app')

@section('title', 'Vehicles')

@section('content')

<style>
    /* Hilangin scrollbar (sama style seperti customers) */
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

    /* Smooth hover row */
    tr.hover-row:hover {
        background: #f7faff;
        transition: 0.18s;
    }

    /* Header tetap rapi, satu baris (jaga agar header tidak wrap) */
    thead th {
        white-space: nowrap;
    }

    /* Cell default boleh wrap (biar muat), tapi beberapa kolom kita set nowrap */
    td { white-space: normal; }

    /* Kolom yang harus tetap 1 baris */
    .nowrap { white-space: nowrap; }

    /* Table general */
    .vehicles-table { min-width: 100%; border-collapse: collapse; }
    .vehicles-table thead th { text-align: left; font-size: 13px; color: #374151; padding: 12px 14px; font-weight: 600; }
    .vehicles-table tbody td { padding: 12px 14px; font-size: 14px; color: #374151; vertical-align: middle; }

    /* Badge kecil untuk status */
    .badge-xs { display:inline-block; padding:4px 8px; border-radius:999px; font-size:12px; font-weight:600; }

    /* Hilangkan horizontal scrollbar visual (still responsive) */
    .table-wrapper { overflow-x: auto; }
    /* hide native scrollbar but allow scrolling by touch/trackpad if needed */
    .table-wrapper.no-scrollbar::-webkit-scrollbar { display:none; }
    .table-wrapper.no-scrollbar { -ms-overflow-style:none; scrollbar-width:none; }

    /* Small responsive tweaks */
    @media (max-width: 900px) {
        .vehicles-table thead th, .vehicles-table tbody td { padding:8px 10px; font-size:13px; }
    }
</style>

<div class="max-w-7xl mx-auto px-6 py-8">

    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">

        {{-- Title + subtitle --}}
        <div class="mb-8">
            <h2 class="text-4xl font-bold text-gray-900 tracking-tight">Vehicles</h2>
            <p class="text-gray-500 mt-1">Kelola data kendaraan rental dengan tampilan modern & clean</p>
        </div>

        {{-- Add Button --}}
        <div class="flex justify-end mb-6">
            <a href="{{ route('vehicles.create') }}"
               class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl shadow-md transition font-medium">
               + Add New Vehicle
            </a>

            <a href="{{ url('/') }}"
               class="ml-4 px-5 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-xl shadow-md transition font-medium">
               Master Menu
            </a>
        </div>

        {{-- Table container (matches customers style) --}}
        <div class="rounded-2xl border border-gray-200 overflow-hidden shadow-sm">

            <div class="table-wrapper no-scrollbar">
                <table class="vehicles-table">
                    <thead class="bg-gradient-to-r from-blue-50 to-blue-100">
                        <tr>
                            <th class="px-5 py-4 text-sm text-gray-700">Vehicle ID</th>
                            <th class="px-5 py-4 text-sm text-gray-700">Make</th>
                            <th class="px-5 py-4 text-sm text-gray-700">Model</th>
                            <th class="px-5 py-4 text-sm text-gray-700">Category</th>
                            <th class="px-5 py-4 text-sm text-gray-700">License Plate</th>
                            <th class="px-5 py-4 text-sm text-gray-700">Daily Rate</th>
                            <th class="px-5 py-4 text-sm text-gray-700">Status</th>
                            <th class="px-5 py-4 text-sm text-gray-700">Location</th>
                            <th class="px-5 py-4 text-sm text-gray-700">Mileage</th>
                            <th class="px-5 py-4 text-sm text-gray-700">Last Maintenance</th>
                            <th class="px-5 py-4 text-sm text-gray-700">Created At</th>
                            <th class="px-5 py-4 text-sm text-gray-700">Updated At</th>
                            <th class="px-5 py-4 text-center text-sm text-gray-700">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-100">
                        @forelse ($vehicles as $vehicle)
                        <tr class="hover-row">

                            <td class="px-5 py-4 text-gray-800 font-medium nowrap">
                                {{ $vehicle->vehicle_id }}
                            </td>

                            <td class="px-5 py-4 text-gray-800 nowrap">
                                {{ $vehicle->make }}
                            </td>

                            <td class="px-5 py-4 text-gray-800 nowrap">
                                {{ $vehicle->model }}
                            </td>

                            <td class="px-5 py-4 text-gray-800 nowrap">
                                {{ $vehicle->category }}
                            </td>

                            <td class="px-5 py-4 text-gray-800 nowrap">
                                {{ $vehicle->license_plate }}
                            </td>

                            <td class="px-5 py-4 text-gray-800 nowrap">
                                Rp {{ number_format($vehicle->daily_rate, 0) }}
                            </td>

                            <td class="px-5 py-4">
                                @php $s = strtolower($vehicle->status); @endphp
                                <span class="badge-xs {{ $s == 'available' ? 'bg-green-100 text-green-700' : ($s == 'maintenance' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">
                                    {{ ucfirst($vehicle->status) }}
                                </span>
                            </td>

                            <td class="px-5 py-4 text-gray-800 nowrap">
                                {{ $vehicle->location ?? '-' }}
                            </td>

                            <td class="px-5 py-4 text-gray-800 nowrap">
                                {{ number_format($vehicle->mileage) }} km
                            </td>

                            <td class="px-5 py-4 text-gray-800">
                                {{ $vehicle->last_maintenance ?? '-' }}
                            </td>

                            <td class="px-5 py-4 text-gray-600 nowrap">
                                {{ optional($vehicle->created_at)->format('Y-m-d') }}
                            </td>

                            <td class="px-5 py-4 text-gray-600 nowrap">
                                {{ optional($vehicle->updated_at)->format('Y-m-d') }}
                            </td>

                            <td class="px-5 py-4 text-center space-x-3 nowrap">
                                <a href="{{ route('vehicles.show', $vehicle->vehicle_id) }}" class="text-blue-600 hover:text-blue-800 font-medium text-sm">View</a>

                                <a href="{{ route('vehicles.edit', $vehicle->vehicle_id) }}" class="text-yellow-600 hover:text-yellow-700 font-medium text-sm">Edit</a>

                                <form action="{{ route('vehicles.destroy', $vehicle->vehicle_id) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this vehicle?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:text-red-800 font-medium text-sm" type="submit">Delete</button>
                                </form>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="13" class="px-5 py-6 text-center text-gray-500 italic">
                                Tidak ada kendaraan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>

    </div>

</div>

@endsection
