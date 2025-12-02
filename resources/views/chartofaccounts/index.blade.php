@extends('layouts.app')

@section('title', 'Chart of Accounts')

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

<div class="max-w-7xl mx-auto px-10 py-8">

    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">

    {{-- Title --}}
    <div class="mb-8">
        <h2 class="text-4xl font-bold text-gray-900 tracking-tight">Chart of Accounts</h2>
        <p class="text-gray-500 mt-1">Daftar akun keuangan dalam sistem</p>
    </div>

    {{-- Buttons + Filter --}}
    <div class="flex items-center justify-between mb-6">

        {{-- Left side empty (biar rapih) --}}
        <div></div>

        {{-- Right side --}}
        <div class="flex items-center space-x-4">

            {{-- Add new --}}
            <a href="{{ route('chart-of-accounts.create') }}"
                class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl shadow-md transition font-medium">
                + Add New Account
            </a>

            {{-- Master menu --}}
            <a href="{{ url('/') }}"
                class="px-5 py-2.5 bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-xl shadow-md transition font-medium">
                Master Menu
            </a>

            {{-- Filter Dropdown --}}
            <form method="GET" action="{{ route('chart-of-accounts.index') }}">
                <select name="group"
                    onchange="this.form.submit()"
                    class="px-4 py-2 rounded-xl border border-gray-300 shadow-sm 
                           focus:ring-2 focus:ring-blue-300 focus:border-blue-500">

                    <option value="">All Accounts</option>

                    <option value="A" {{ request('group')=='A' ? 'selected' : '' }}>A. Assets (1000–1999)</option>
                    <option value="B" {{ request('group')=='B' ? 'selected' : '' }}>B. Liabilities (2000–2999)</option>
                    <option value="C" {{ request('group')=='C' ? 'selected' : '' }}>C. Equity (3000–3999)</option>
                    <option value="D" {{ request('group')=='D' ? 'selected' : '' }}>D. Revenue (4000–4999)</option>
                    <option value="E" {{ request('group')=='E' ? 'selected' : '' }}>E. Expenses (5000–5999)</option>

                </select>
            </form>

        </div>

    </div>


        {{-- Success --}}
        @if(session('success'))
            <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded-xl shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- Table --}}
        <div class="rounded-2xl border border-gray-200 overflow-hidden shadow-sm">

            @php
                $groups = [
                    'A. Assets (1000–1999)'      => $accounts->whereBetween('code', [1000,1999]),
                    'B. Liabilities (2000–2999)' => $accounts->whereBetween('code', [2000,2999]),
                    'C. Equity (3000–3999)'      => $accounts->whereBetween('code', [3000,3999]),
                    'D. Revenue (4000–4999)'     => $accounts->whereBetween('code', [4000,4999]),
                    'E. Expenses (5000–5999)'    => $accounts->whereBetween('code', [5000,5999]),
                ];
            @endphp

            <div class="overflow-x-auto no-scrollbar">

                <table class="min-w-full">

                    <thead class="bg-gradient-to-r from-blue-50 to-blue-100">
                        <tr>
                            <th class="px-5 py-4 text-left text-sm font-semibold text-gray-700">COA Number</th>
                            <th class="px-5 py-4 text-left text-sm font-semibold text-gray-700">Account Name</th>
                            <th class="px-5 py-4 text-left text-sm font-semibold text-gray-700">Category</th>
                            <th class="px-5 py-4 text-left text-sm font-semibold text-gray-700">Type</th>
                            <th class="px-5 py-4 text-left text-sm font-semibold text-gray-700">Balance Type</th>
                            <th class="px-5 py-4 text-right text-sm font-semibold text-gray-700">Start Balance</th>
                            <th class="px-5 py-4 text-center text-sm font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-100">

                        {{-- Loop Grouping A–E --}}
                        @foreach ($groups as $groupName => $group)
                            
                            {{-- Group Header --}}
                            <tr class="bg-gray-100">
                                <td colspan="7" class="px-5 py-3 font-bold text-gray-800 text-lg">
                                    {{ $groupName }}
                                </td>
                            </tr>

                            {{-- Group Items --}}
                            @forelse ($group as $acc)
                                <tr class="hover-row">

                                    {{-- COA Number --}}
                                    <td class="px-5 py-4 font-medium text-gray-800">
                                        {{ $acc->code }}
                                    </td>

                                    {{-- Account Name --}}
                                    <td class="px-5 py-4 text-gray-800">
                                        {{ $acc->name }}
                                    </td>

                                    {{-- Category --}}
                                    <td class="px-5 py-4 text-gray-700">
                                        {{ ucfirst($acc->category) }}
                                    </td>

                                    {{-- Type --}}
                                    <td class="px-5 py-4">
                                        {{ ucfirst($acc->type) }}
                                    </td>

                                    {{-- Balance Type --}}
                                    <td class="px-5 py-4">
                                        <span class="px-3 py-1 text-xs rounded-full font-semibold
                                            {{ $acc->balance_type == 'debit'
                                                ? 'bg-green-100 text-green-700'
                                                : 'bg-red-100 text-red-700' }}">
                                            {{ ucfirst($acc->balance_type) }}
                                        </span>
                                    </td>

                                    {{-- Start Balance --}}
                                    <td class="px-5 py-4 text-right text-gray-800">
                                        {{ number_format($acc->start_balance, 2) }}
                                    </td>

                                    {{-- Actions --}}
                                    <td class="px-5 py-4 text-center space-x-3">

                                        <a href="{{ route('chart-of-accounts.edit', $acc->id) }}"
                                            class="text-yellow-600 hover:text-yellow-700 font-medium text-sm">Edit</a>

                                        <form action="{{ route('chart-of-accounts.destroy', $acc->id) }}"
                                              method="POST"
                                              class="inline-block"
                                              onsubmit="return confirm('Delete this account?');">

                                            @csrf
                                            @method('DELETE')

                                            <button class="text-red-600 hover:text-red-800 font-medium text-sm">
                                                Delete
                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty
                                <tr>
                                    <td colspan="7" class="px-5 py-4 text-gray-500">
                                        (Tidak ada data)
                                    </td>
                                </tr>

                            @endforelse

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection
