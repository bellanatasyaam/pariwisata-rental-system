<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Rental System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex flex-col items-center justify-center px-6">

        {{-- CARD --}}
        <div class="bg-white shadow-lg rounded-xl p-10 w-full max-w-3xl">
            
            <h1 class="text-3xl font-bold text-gray-800 text-center mb-3">
                Vehicle Rental System
            </h1>

            <p class="text-center text-gray-600 mb-8">
                Welcome! Choose a module to continue
            </p>

            {{-- GRID MENU --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                {{-- Customers --}}
                <a href="{{ url('/customers') }}" 
                   class="block p-5 bg-blue-50 hover:bg-blue-100 border border-blue-300 rounded-lg transition">
                    <h2 class="text-lg font-semibold text-blue-700">Customers</h2>
                    <p class="text-sm text-blue-600">Kelola data pelanggan</p>
                </a>

                {{-- Vehicles --}}
                <a href="{{ url('/vehicles') }}" 
                   class="block p-5 bg-green-50 hover:bg-green-100 border border-green-300 rounded-lg transition">
                    <h2 class="text-lg font-semibold text-green-700">Vehicles</h2>
                    <p class="text-sm text-green-600">Data kendaraan & status</p>
                </a>

                {{-- Reservations --}}
                <a href="{{ url('/reservations') }}" 
                   class="block p-5 bg-yellow-50 hover:bg-yellow-100 border border-yellow-300 rounded-lg transition">
                    <h2 class="text-lg font-semibold text-yellow-700">Reservations</h2>
                    <p class="text-sm text-yellow-600">Permintaan reservasi</p>
                </a>

                {{-- Rentals --}}
                <a href="{{ url('/rentals') }}" 
                   class="block p-5 bg-purple-50 hover:bg-purple-100 border border-purple-300 rounded-lg transition">
                    <h2 class="text-lg font-semibold text-purple-700">Rentals</h2>
                    <p class="text-sm text-purple-600">Transaksi penyewaan aktif</p>
                </a>

                {{-- Payments --}}
                <a href="{{ url('/payments') }}" 
                   class="block p-5 bg-red-50 hover:bg-red-100 border border-red-300 rounded-lg transition">
                    <h2 class="text-lg font-semibold text-red-700">Payments</h2>
                    <p class="text-sm text-red-600">Pembayaran & invoice</p>
                </a>

                {{-- Maintenance --}}
                <a href="{{ url('/maintenance') }}" 
                   class="block p-5 bg-indigo-50 hover:bg-indigo-100 border border-indigo-300 rounded-lg transition">
                    <h2 class="text-lg font-semibold text-indigo-700">Maintenance</h2>
                    <p class="text-sm text-indigo-600">Riwayat perawatan kendaraan</p>
                </a>

            </div>
        </div>

        <p class="text-center text-gray-500 text-sm mt-6">
            © 2025 Vehicle Rental System — All rights reserved.
        </p>

    </div>

</body>
</html>
