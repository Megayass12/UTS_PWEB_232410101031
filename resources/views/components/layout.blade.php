<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MegaVerse</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Comic Neue', cursive;
        }
    </style>
</head>
<body class="bg-pink-50">
    @include('components.navbar')
    <main class="min-h-screen">
        @yield('content')
    </main>
    @include('components.footer')
</body>
</html>
