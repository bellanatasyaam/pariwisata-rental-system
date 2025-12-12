@extends('layouts.app')

@section('title', 'Edit Customer')

@section('content')

<div class="max-w-3xl mx-auto px-6 py-10">

    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">

        {{-- Title --}}
        <h2 class="text-3xl font-bold text-gray-900 mb-1">
            Edit Customer
        </h2>
        <p class="text-gray-500 mb-8">
            Perbarui data pelanggan sesuai kebutuhan
        </p>

        {{-- Form --}}
        <form action="{{ route('customers.update', $customer->customer_id) }}" 
              method="POST" 
              class="space-y-6">
            @csrf
            @method('PUT')

            {{-- First Name --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">First Name</label>
                <input type="text" name="first_name"
                    value="{{ $customer->first_name }}"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    required>
            </div>

            {{-- Last Name --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Last Name</label>
                <input type="text" name="last_name"
                    value="{{ $customer->last_name }}"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    required>
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Email</label>
                <input type="email" name="email"
                    value="{{ $customer->email }}"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    required>
            </div>

            {{-- Phone --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Phone</label>
                <input type="text" name="phone"
                    value="{{ $customer->phone }}"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    required>
            </div>

            {{-- Customer Type --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Customer Type</label>
                <select name="customer_type"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    required>

                    <option value="Regular" {{ $customer->customer_type == 'Regular' ? 'selected' : '' }}>
                        Regular
                    </option>
                    <option value="VIP" {{ $customer->customer_type == 'VIP' ? 'selected' : '' }}>
                        VIP
                    </option>
                </select>
            </div>

            {{-- Submit --}}
            <div class="flex justify-end pt-4">
                <button type="submit"
                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-xl shadow-md transition">
                    Update Customer
                </button>

                <a href="{{ route('customers.index') }}"
                    class="ml-4 px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium rounded-xl shadow-md transition">
                    Cancel
                </a>
            </div>

        </form>

    </div>

</div>

@endsection
    