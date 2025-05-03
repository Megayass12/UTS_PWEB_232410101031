@extends('components.guest')
@section('title', 'Welcome | Track Your Assignment!')
@section('content')
<div class="flex h-screen">
    <div class="hidden xl:block w-1/2 h-screen">
        <img src="https://i.pinimg.com/736x/86/33/01/863301ce55cf2f54fe389b2804a2ab98.jpg" alt="pict-login" class="w-full h-full object-cover">
    </div>
    <div class="w-full xl:w-1/2 bg-pink-200 p-8 shadow-md flex items-center justify-center">
        <div class="w-full max-w-md">
            <h1 class="text-2xl font-bold text-center mb-6">WELCOME!</h1>
            <p class="text-center font-roboto">
                Selamat datang di Mega To-do, website untuk tracking tugasmu dan lancarkan aktivitasmu!
            </p>
            @if (request('error'))
            <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
                {{ request('error') }}
            </div>
            @endif
            <form action="{{ route('authenticate') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium">Username</label>
                    <input type="text" id="username" name="username" class="w-full border border-zinc-900 p-2 rounded">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password" class="w-full border border-zinc-900 p-2 rounded">
                        <button type="button" id="iconPassword" class="absolute right-2 top-1/2 transform -translate-y-1/2"></button>
                    </div>
                </div>
                <script>
                    document.getElementById('iconPassword').addEventListener('click', function() {
                        const passwordField = document.getElementById('password');
                        const passwordIcon = document.getElementById('passwordIcon');
                        if (passwordField.type === "password") {
                            passwordField.type = "text";
                            passwordIcon.src = "https://cdn-icons-png.flaticon.com/128/2767/2767194.png";
                        } else {
                            passwordField.type = "password";
                            passwordIcon.src = "https://cdn-icons-png.flaticon.com/128/2767/2767146.png";
                        }
                    });
                </script>
                <button type="submit" class="bg-rose-500 text-white py-2 px-4 rounded">Login</button>
            </form>
        </div>
    </div>
</div>
    @endsection
