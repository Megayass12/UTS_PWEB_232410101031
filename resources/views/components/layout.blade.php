<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    {{-- Menambahkan pengecekan untuk tidak menampilkan navbar di halaman login --}}
    @if(!request()->routeIs('login'))  <!-- Cek apakah bukan halaman login -->
        <x-navbar />
    @endif

    <div class="container mx-auto py-8">
        @yield('content')
    </div>

    <x-footer />
</body>
</html>
