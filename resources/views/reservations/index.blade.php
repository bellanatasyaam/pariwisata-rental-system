@extends('layouts.app')

@section('title', 'Reservations')

@section('content')

<style>
    /* Biar full width */
    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    table {
        width: 100%;
        table-layout: auto; /* <-- BIAR LEBIH NATURAL DAN LEBAR */
        border-collapse: collapse;
    }

    th, td {
        padding: 10px 14px;
        white-space: nowrap;
        font-size: 14px;
    }

    thead th {
        background: #f3f7ff;
        font-weight: 600;
        color: #425579;
        border-bottom: 1px solid #dbe3f0;
    }

    tbody tr {
        border-bottom: 1px solid #f0f0f0;
    }

    tbody tr:hover {
        background: #f9fbff;
    }

    /* Action column */
    td a {
        font-weight: 500;
    }
</style>


<div class="w-[95%] mx-auto px-6 py-8">

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
            <div class="table-wrapper">

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

                                <td class="px-3 py-2 text-center nowrap">

                                    <a href="{{ route('reservations.show', $res->reservation_id) }}"
                                    class="action-btn text-blue-600 hover:text-blue-800">View</a>

                                    <a href="{{ route('reservations.edit', $res->reservation_id) }}"
                                    class="action-btn text-yellow-600 hover:text-yellow-700 ml-2">Edit</a>

                                    <form action="{{ route('reservations.destroy', $res->reservation_id) }}"
                                        method="POST" class="inline-block ml-2"
                                        onsubmit="return confirm('Delete this reservation?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="action-btn text-red-600 hover:text-red-800" type="submit">
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
