@extends('layouts.app')

@section('title', 'Reservations')

@section('content')

<style>
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }

    tr.hover-row:hover {
        background: #f7faff;
        transition: 0.18s;
    }

    thead th { white-space: nowrap; }
    td { white-space: normal; }

    .nowrap { white-space: nowrap; }

    .table-wrapper { overflow-x: auto; }
    .table-wrapper.no-scrollbar::-webkit-scrollbar { display: none; }

    .badge-xs {
        display:inline-block;
        padding:4px 8px;
        border-radius:999px;
        font-size:12px;
        font-weight:600;
    }
</style>

<div class="max-w-7xl mx-auto px-6 py-8">

    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">

        {{-- Title --}}
        <div class="mb-8">
            <h2 class="text-4xl font-bold text-gray-900 tracking-tight">Reservations</h2>
            <p class="text-gray-500 mt-1">Kelola data reservasi kendaraan</p>
        </div>

        {{-- Add Button --}}
        <div class="flex justify-end mb-6">
            <a href="{{ route('reservations.create') }}"
                class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl shadow-md transition font-medium">
                + Add New Reservation
            </a>

            <a href="{{ url('/') }}"
                class="ml-4 px-5 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-xl shadow-md transition font-medium">
                Master Menu
            </a>
        </div>

        {{-- Table --}}
        <div class="rounded-2xl border border-gray-200 overflow-hidden shadow-sm">
            <div class="table-wrapper no-scrollbar">

                <table class="min-w-full">
                    <thead class="bg-gradient-to-r from-blue-50 to-blue-100">
                        <tr>
                            <th class="px-5 py-4 text-sm font-semibold text-gray-700">Reservation ID</th>
                            <th class="px-5 py-4 text-sm font-semibold text-gray-700">Customer</th>
                            <th class="px-5 py-4 text-sm font-semibold text-gray-700">Vehicle</th>
                            <th class="px-5 py-4 text-sm font-semibold text-gray-700">Start Date</th>
                            <th class="px-5 py-4 text-sm font-semibold text-gray-700">End Date</th>
                            <th class="px-5 py-4 text-sm font-semibold text-gray-700">Status</th>
                            <th class="px-5 py-4 text-sm font-semibold text-gray-700">Created At</th>
                            <th class="px-5 py-4 text-sm font-semibold text-gray-700">Updated At</th>
                            <th class="px-5 py-4 text-center text-sm font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-100">

                        @forelse ($reservations as $res)
                        <tr class="hover-row">

                            <td class="px-5 py-4 font-medium text-gray-800 nowrap">
                                {{ $res->reservation_id }}
                            </td>

                            <td class="px-5 py-4 text-gray-800 nowrap">
                                {{ $res->customer_id }}
                            </td>

                            <td class="px-5 py-4 text-gray-800 nowrap">
                                {{ $res->vehicle_id }}
                            </td>

                            <td class="px-5 py-4 text-gray-800 nowrap">
                                {{ $res->start_date }}
                            </td>

                            <td class="px-5 py-4 text-gray-800 nowrap">
                                {{ $res->end_date }}
                            </td>

                            <td class="px-5 py-4">
                                @php $st = strtolower($res->status); @endphp
                                <span class="badge-xs
                                    {{ $st == 'confirmed' ? 'bg-green-100 text-green-700' :
                                       ($st == 'pending' ? 'bg-yellow-100 text-yellow-700' : 'bg-red-100 text-red-700') }}">
                                    {{ ucfirst($res->status) }}
                                </span>
                            </td>

                            <td class="px-5 py-4 text-gray-600 nowrap">
                                {{ optional($res->created_at)->format('Y-m-d') }}
                            </td>

                            <td class="px-5 py-4 text-gray-600 nowrap">
                                {{ optional($res->updated_at)->format('Y-m-d') }}
                            </td>

                            <td class="px-5 py-4 text-center space-x-3 nowrap">

                                <a href="{{ route('reservations.show', $res->reservation_id) }}"
                                   class="text-blue-600 hover:text-blue-800 font-medium text-sm">View</a>

                                <a href="{{ route('reservations.edit', $res->reservation_id) }}"
                                   class="text-yellow-600 hover:text-yellow-700 font-medium text-sm">Edit</a>

                                <form action="{{ route('reservations.destroy', $res->reservation_id) }}"
                                      method="POST" class="inline-block"
                                      onsubmit="return confirm('Delete this reservation?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:text-red-800 font-medium text-sm" type="submit">
                                        Delete
                                    </button>
                                </form>

                            </td>

                        </tr>

                        @empty
                        <tr>
                            <td colspan="9" class="px-5 py-6 text-center text-gray-500 italic">
                                Tidak ada reservasi.
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
