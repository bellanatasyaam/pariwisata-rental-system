@extends('layouts.app')

@section('title', 'Add New Account')

@section('content')

<div class="max-w-3xl mx-auto px-6 py-10">

    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100">

        {{-- Title --}}
        <h2 class="text-3xl font-bold text-gray-900 mb-1">
            Add New Account
        </h2>
        <p class="text-gray-500 mb-8">
            Isi data akun keuangan dengan lengkap dan benar
        </p>

        {{-- Form --}}
        <form action="{{ route('chart-of-accounts.store') }}" method="POST" class="space-y-6">
            @csrf

            {{-- COA Number --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">COA Number*</label>
                <input type="text" name="code"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 
                    focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    placeholder="1101, 3101, 5101, etc" required>
            </div>

            {{-- Account Name --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Account Name*</label>
                <input type="text" name="name"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 
                    focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    placeholder="Cash, Aset Kendaraan, Pendapatan Sewa" required>
            </div>

            {{-- Type (A–E) --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Type*</label>
                <select id="typeSelect" name="type"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 
                    focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    required>
                    <option value="">-- Select Type --</option>
                    <option value="asset">Asset</option>
                    <option value="liability">Liability</option>
                    <option value="equity">Equity</option>
                    <option value="revenue">Revenue</option>
                    <option value="expense">Expense</option>
                </select>
            </div>

            {{-- Category (Auto follow Type) --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Category*</label>
                <select id="categorySelect" name="category"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 
                    focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    required>

                    <option value="">-- Select Category --</option>

                    {{-- ASSET --}}
                    <option data-type="asset" value="current_asset">Current Asset</option>
                    <option data-type="asset" value="fixed_asset">Fixed Asset</option>

                    {{-- LIABILITY --}}
                    <option data-type="liability" value="current_liability">Current Liability</option>
                    <option data-type="liability" value="longterm_liability">Long-term Liability</option>

                    {{-- EQUITY --}}
                    <option data-type="equity" value="equity">Equity</option>

                    {{-- REVENUE --}}
                    <option data-type="revenue" value="income">Income</option>

                    {{-- EXPENSE --}}
                    <option data-type="expense" value="expense">Expense</option>
                </select>
            </div>

            {{-- Start Balance --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Start Balance (Optional)</label>
                <input type="number" step="0.01" name="start_balance"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 
                    focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    placeholder="0.00">
            </div>

            {{-- Description --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Description (Optional)</label>
                <textarea name="description" rows="3"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 
                    focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    placeholder="Deskripsi singkat akun..."></textarea>
            </div>

            {{-- Balance Type --}}
            <div>
                <label class="block text-gray-700 font-medium mb-1">Balance Type*</label>
                <select name="balance_type"
                    class="w-full px-4 py-3 rounded-xl border border-gray-300 
                    focus:ring-2 focus:ring-blue-300 focus:border-blue-500 transition"
                    required>
                    <option value="">-- Select Balance Type --</option>
                    <option value="debit">Debit</option>
                    <option value="credit">Credit</option>
                </select>
            </div>

            {{-- Submit --}}
            <div class="flex justify-end pt-4">
                <button type="submit"
                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white 
                    font-medium rounded-xl shadow-md transition">
                    Save Account
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

{{-- JS: Auto Filter Category --}}
<script>
document.getElementById('typeSelect').addEventListener('change', function () {
    const type = this.value;
    const categories = document.querySelectorAll('#categorySelect option');

    categories.forEach(opt => {
        if (opt.value === "") {
            opt.hidden = false;
            return;
        }
        opt.hidden = opt.dataset.type !== type;
    });

    document.getElementById('categorySelect').value = "";
});
</script>

@endsection
