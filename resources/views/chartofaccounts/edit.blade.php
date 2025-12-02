@extends('layouts.app')

@section('title', 'Edit Account')

@section('content')

<div class="max-w-3xl mx-auto px-6 py-10">

    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">

        {{-- Title --}}
        <h2 class="text-3xl font-bold text-gray-900 mb-1">
            Edit Account
        </h2>
        <p class="text-gray-500 mb-8">
            Perbarui data akun keuangan dengan benar
        </p>

        {{-- Form --}}
        <form action="{{ route('chart-of-accounts.update', $chart_of_account->id) }}" 
              method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- COA Number --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">COA Number*</label>
                <input type="text" name="code"
                    value="{{ $chart_of_account->code }}"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 
                    focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition" required>
            </div>

            {{-- Account Name --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Account Name*</label>
                <input type="text" name="name"
                    value="{{ $chart_of_account->name }}"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 
                    focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition" required>
            </div>

            {{-- Category (Grouped A–E) --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Category*</label>
                <select name="category"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 
                    focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition" required>

                    {{-- A - Assets --}}
                    <optgroup label="A. Assets">
                        <option value="current_asset" 
                            {{ $chart_of_account->category == 'current_asset' ? 'selected' : '' }}>
                            Current Asset
                        </option>
                        <option value="fixed_asset" 
                            {{ $chart_of_account->category == 'fixed_asset' ? 'selected' : '' }}>
                            Fixed Asset
                        </option>
                    </optgroup>

                    {{-- B - Liabilities --}}
                    <optgroup label="B. Liabilities">
                        <option value="current_liability" 
                            {{ $chart_of_account->category == 'current_liability' ? 'selected' : '' }}>
                            Current Liability
                        </option>

                        <option value="longterm_liability" 
                            {{ $chart_of_account->category == 'longterm_liability' ? 'selected' : '' }}>
                            Long-term Liability
                        </option>
                    </optgroup>

                    {{-- C - Equity --}}
                    <optgroup label="C. Equity">
                        <option value="equity" 
                            {{ $chart_of_account->category == 'equity' ? 'selected' : '' }}>
                            Equity
                        </option>
                    </optgroup>

                    {{-- D - Revenue --}}
                    <optgroup label="D. Revenue">
                        <option value="income" 
                            {{ $chart_of_account->category == 'income' ? 'selected' : '' }}>
                            Income
                        </option>
                    </optgroup>

                    {{-- E - Expenses --}}
                    <optgroup label="E. Expenses">
                        <option value="expense" 
                            {{ $chart_of_account->category == 'expense' ? 'selected' : '' }}>
                            Expense
                        </option>
                    </optgroup>
                </select>
            </div>

            {{-- Type --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Type*</label>
                <select name="type"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 
                    focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition" required>

                    @foreach(['asset','liability','equity','revenue','expense'] as $t)
                        <option value="{{ $t }}"
                            {{ $chart_of_account->type == $t ? 'selected' : '' }}>
                            {{ ucfirst($t) }}
                        </option>
                    @endforeach

                </select>
            </div>

            {{-- Start Balance --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Start Balance (Optional)</label>
                <input type="number" step="0.01" name="start_balance"
                    value="{{ $chart_of_account->start_balance }}"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 
                    focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    placeholder="e.g. 57370768.52">
            </div>

            {{-- Description --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Description (Optional)</label>
                <textarea name="description" rows="3"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 
                    focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    placeholder="Deskripsi akun...">{{ $chart_of_account->description }}</textarea>
            </div>

            {{-- Balance Type --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Balance Type*</label>
                <select name="balance_type"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 
                    focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition" required>

                    <option value="debit" 
                        {{ $chart_of_account->balance_type == 'debit' ? 'selected' : '' }}>
                        Debit
                    </option>
                    <option value="credit" 
                        {{ $chart_of_account->balance_type == 'credit' ? 'selected' : '' }}>
                        Credit
                    </option>

                </select>
            </div>

            {{-- Submit --}}
            <div class="flex justify-end pt-4">
                <button type="submit"
                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white 
                    font-medium rounded-xl shadow-md transition">
                    Update Account
                </button>

                <a href="{{ route('chart-of-accounts.index') }}"
                    class="ml-4 px-6 py-3 bg-gray-200 hover:bg-gray-300 
                    text-gray-800 font-medium rounded-xl shadow-md transition">
                    Cancel
                </a>
            </div>

        </form>

    </div>

</div>

@endsection
