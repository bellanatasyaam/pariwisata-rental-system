@extends('layouts.app')

@section('title', 'Customers')

@section('content')

<style>
    /* Hilangin scrollbar */
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    /* Smooth hover row */
    tr.hover-row:hover {
        background: #f7faff; /* soft blue */
        transition: 0.2s;
    }
</style>

<div class="max-w-7xl mx-auto px-6 py-8">

    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">

        {{-- Title + subtitle --}}
        <div class="mb-8">
            <h2 class="text-4xl font-bold text-gray-900 tracking-tight">
                Customers
            </h2>
            <p class="text-gray-500 mt-1">
                Kelola data pelanggan terdaftar dengan tampilan modern & clean
            </p>
        </div>

        {{-- Add Button --}}
        <div class="flex justify-end mb-6">
            <a href="{{ route('customers.create') }}"
                class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl shadow-md transition font-medium">
                + Add New Customer
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
                            <th class="px-5 py-4 text-left text-sm font-semibold text-gray-700">Customer ID</th>
                            <th class="px-5 py-4 text-left text-sm font-semibold text-gray-700">Name</th>
                            <th class="px-5 py-4 text-left text-sm font-semibold text-gray-700">Email</th>
                            <th class="px-5 py-4 text-left text-sm font-semibold text-gray-700">Phone</th>
                            <th class="px-5 py-4 text-left text-sm font-semibold text-gray-700">Type</th>
                            <th class="px-5 py-4 text-center text-sm font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-100">

                        @foreach ($customers as $customer)
                        <tr class="hover-row">

                            <td class="px-5 py-4 text-gray-800 font-medium">
                                {{ $customer->customer_id }}
                            </td>

                            <td class="px-5 py-4 text-gray-800">
                                {{ $customer->first_name }} {{ $customer->last_name }}
                            </td>

                            <td class="px-5 py-4 text-gray-600">
                                {{ $customer->email }}
                            </td>

                            <td class="px-5 py-4 text-gray-600">
                                {{ $customer->phone }}
                            </td>

                            <td class="px-5 py-4">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold
                                    {{ $customer->customer_type == 'VIP'
                                        ? 'bg-yellow-100 text-yellow-700'
                                        : 'bg-green-100 text-green-700' }}">
                                    {{ $customer->customer_type }}
                                </span>
                            </td>

                            <td class="px-5 py-4 text-center space-x-3">

                                {{-- View --}}
                                <a href="{{ route('customers.show', ['customer' => $customer->customer_id]) }}"
                                    class="text-blue-600 hover:text-blue-800 font-medium text-sm">
                                    View
                                </a>

                                {{-- Edit --}}
                                <a href="{{ route('customers.edit', ['customer' => $customer->customer_id]) }}"
                                    class="text-yellow-600 hover:text-yellow-700 font-medium text-sm">
                                    Edit
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('customers.destroy', ['customer' => $customer->customer_id]) }}"
                                      method="POST"
                                      class="inline-block"
                                      onsubmit="return confirm('Delete this customer?');">
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
