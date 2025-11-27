<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Vehicle Rental System' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans">

    {{-- NAVBAR OPTIONAL --}}
    <div class="w-full bg-white shadow-md mb-6">
        <div class="max-w-6xl mx-auto px-6 py-4">
            <h1 class="text-xl font-bold text-gray-700">Vehicle Rental System</h1>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-6">
        @yield('content')
    </div>

</body>
</html>
