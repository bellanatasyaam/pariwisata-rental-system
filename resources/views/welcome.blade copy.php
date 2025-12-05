<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Rental System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">

<div class="min-h-screen flex flex-col items-center justify-center px-6">

    {{-- CARD WRAPPER --}}
    <div class="bg-white rounded-2xl shadow-lg p-12 w-full max-w-5xl">

        <h1 class="text-4xl font-extrabold text-gray-900 text-center mb-4">
            Vehicle Rental System
        </h1>

        <p class="text-center text-gray-600 mb-12 text-lg">
            Welcome! Choose a module to continue
        </p>

        {{-- GRID MENU --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7">

            {{-- Chart of Accounts --}}
            <a href="{{ url('/chart-of-accounts') }}" 
            class="p-7 rounded-xl border border-teal-200 bg-teal-50 hover:shadow-lg hover:-translate-y-1 transition">
                <h2 class="text-2xl font-semibold text-teal-700">Chart of Accounts</h2>
                <p class="text-base text-teal-600">Daftar akun keuangan</p>
            </a>

            {{-- Customers --}}
            <a href="{{ url('/customers') }}" 
               class="p-7 rounded-xl border border-blue-200 bg-blue-50 hover:shadow-lg hover:-translate-y-1 transition">
                <h2 class="text-2xl font-semibold text-blue-700">Customers</h2>
                <p class="text-base text-blue-600">Kelola data pelanggan</p>
            </a>

            {{-- Vehicles --}}
            <a href="{{ url('/vehicles') }}" 
               class="p-7 rounded-xl border border-green-200 bg-green-50 hover:shadow-lg hover:-translate-y-1 transition">
                <h2 class="text-2xl font-semibold text-green-700">Vehicles</h2>
                <p class="text-base text-green-600">Data kendaraan & status</p>
            </a>

            {{-- Reservations --}}
            <a href="{{ url('/reservations') }}" 
               class="p-7 rounded-xl border border-yellow-300 bg-yellow-50 hover:shadow-lg hover:-translate-y-1 transition">
                <h2 class="text-2xl font-semibold text-yellow-700">Reservations</h2>
                <p class="text-base text-yellow-600">Permintaan reservasi</p>
            </a>

            {{-- Rentals --}}
            <a href="{{ url('/rentals') }}" 
               class="p-7 rounded-xl border border-purple-200 bg-purple-50 hover:shadow-lg hover:-translate-y-1 transition">
                <h2 class="text-2xl font-semibold text-purple-700">Rentals</h2>
                <p class="text-base text-purple-600">Transaksi penyewaan aktif</p>
            </a>

            {{-- Payments --}}
            <a href="{{ url('/payments') }}" 
               class="p-7 rounded-xl border border-red-200 bg-red-50 hover:shadow-lg hover:-translate-y-1 transition">
                <h2 class="text-2xl font-semibold text-red-700">Payments</h2>
                <p class="text-base text-red-600">Pembayaran & invoice</p>
            </a>

            {{-- Maintenance --}}
            <a href="{{ url('/maintenance') }}" 
               class="p-7 rounded-xl border border-indigo-200 bg-indigo-50 hover:shadow-lg hover:-translate-y-1 transition">
                <h2 class="text-2xl font-semibold text-indigo-700">Maintenance</h2>
                <p class="text-base text-indigo-600">Riwayat perawatan kendaraan</p>
            </a>

        </div>
    </div>

    {{-- FOOTER --}}
    <p class="text-center text-gray-500 text-sm mt-8">
        © 2025 Vehicle Rental System — All rights reserved.
    </p>

</div>

</body>
</html>
