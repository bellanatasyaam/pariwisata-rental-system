@extends('layouts.app')

@section('title', 'Rentals')

@section('content')

<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    tr.hover-row:hover {
        background: #f7faff;
        transition: 0.2s;
    }
</style>

<div class="max-w-7xl mx-auto px-6 py-8">

    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">

        {{-- Title --}}
        <div class="mb-8">
            <h2 class="text-4xl font-bold text-gray-900 tracking-tight">
                Rentals
            </h2>
            <p class="text-gray-500 mt-1">
                Kelola data rental kendaraan dengan tampilan modern & clean
            </p>
        </div>

        {{-- Add Button --}}
        <div class="flex justify-end mb-6">
            <a href="{{ route('rentals.create') }}"
                class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl shadow-md transition font-medium">
                + Add New Rental
            </a>

            <a href="{{ url('/') }}"
                class="ml-4 px-5 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-xl shadow-md transition font-medium">
                Master Menu
            </a>
        </div>

        {{-- Table --}}
        <div class="rounded-2xl border border-gray-200 overflow-hidden shadow-sm">

            <div class="overflow-x-auto no-scrollbar">
                <table class="min-w-full">
                    <thead class="bg-gradient-to-r from-blue-50 to-blue-100">
                        <tr>
                            <th class="px-5 py-4 text-left text-sm font-semibold text-gray-700">Rental ID</th>
                            <th class="px-5 py-4 text-left text-sm font-semibold text-gray-700">Customer</th>
                            <th class="px-5 py-4 text-left text-sm font-semibold text-gray-700">Vehicle</th>
                            <th class="px-5 py-4 text-left text-sm font-semibold text-gray-700">Start</th>
                            <th class="px-5 py-4 text-left text-sm font-semibold text-gray-700">End</th>
                            <th class="px-5 py-4 text-left text-sm font-semibold text-gray-700">Base Cost</th>
                            <th class="px-5 py-4 text-left text-sm font-semibold text-gray-700">Total Amount</th>
                            <th class="px-5 py-4 text-left text-sm font-semibold text-gray-700">Status</th>
                            <th class="px-5 py-4 text-left text-sm font-semibold text-gray-700">Pickup</th>
                            <th class="px-5 py-4 text-center text-sm font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-100">

                        @foreach ($rentals as $rental)
                        <tr class="hover-row">

                            <td class="px-5 py-4 font-medium text-gray-800">
                                {{ $rental->rental_id }}
                            </td>

                            <td class="px-5 py-4 text-gray-700">
                                {{ $rental->customer_id }}
                            </td>

                            <td class="px-5 py-4 text-gray-700">
                                {{ $rental->vehicle_id }}
                            </td>

                            <td class="px-5 py-4 text-gray-600">
                                {{ $rental->start_date }}
                            </td>

                            <td class="px-5 py-4 text-gray-600">
                                {{ $rental->end_date }}
                            </td>

                            <td class="px-5 py-4 text-gray-800">
                                Rp{{ number_format($rental->base_cost, 0, ',', '.') }}
                            </td>

                            <td class="px-5 py-4 text-gray-800">
                                Rp{{ number_format($rental->total_amount, 0, ',', '.') }}
                            </td>

                            <td class="px-5 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                    @if ($rental->status == 'completed')
                                        bg-green-100 text-green-700
                                    @elseif ($rental->status == 'cancelled')
                                        bg-red-100 text-red-700
                                    @else
                                        bg-yellow-100 text-yellow-700
                                    @endif">
                                    {{ ucfirst($rental->status) }}
                                </span>
                            </td>

                            <td class="px-5 py-4 text-gray-700">
                                {{ $rental->pickup_location }}
                            </td>

                            <td class="px-5 py-4 text-center space-x-3">

                                {{-- View --}}
                                <a href="{{ route('rentals.show', ['rental' => $rental->rental_id]) }}"
                                    class="text-blue-600 hover:text-blue-800 font-medium text-sm">
                                    View
                                </a>

                                {{-- Edit --}}
                                <a href="{{ route('rentals.edit', ['rental' => $rental->rental_id]) }}"
                                    class="text-yellow-600 hover:text-yellow-700 font-medium text-sm">
                                    Edit
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('rentals.destroy', ['rental' => $rental->rental_id]) }}"
                                      method="POST" class="inline-block"
                                      onsubmit="return confirm('Delete this rental?');">
                                    @csrf
                                    @method('DELETE')

                                    <button class="text-red-600 hover:text-red-800 font-medium text-sm">
                                        Delete
                                    </button>
                                </form>

                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>

    </div>

</div>

@endsection
