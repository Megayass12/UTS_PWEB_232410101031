@extends('components.layout')
@section('title','MegaVerse | Track Your Assignment!')
@section('content')
<div class="text-center py-12 bg-pink-100 rounded-2xl m-6 shadow-md">
    <h1 class="text-4xl text-pink-600 font-extrabold mb-4">Welcome {{ $username ?? 'Guest' }}!</h1>
    <div id="realtime-clock" class="bg-white border-2 border-pink-300 rounded-lg px-4 py-2 text-lg absolute top-40 right-30 text-lg font-bold text-pink-600 shadow-lg"></div>
    <div class="flex justify-center">
        <img src="https://i.pinimg.com/736x/49/e8/5f/49e85f7dc65d4d5926a76717fea13d14.jpg"
             alt="Hero Image"
             class="w-52 h-52 object-cover rounded-full border-4 border-pink-300 shadow-lg animate-bounce-slow">
    </div>
    <style>
        @keyframes bounceSlow {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
        .animate-bounce-slow {
            animation: bounceSlow 2s infinite; 
        }
    </style>
    <p class="text-pink-500 mt-4 text-lg">Tracking your activity, be productive with <span class="font-bold">MegaVerse!</span></p>
</div>
<div class="flex justify-center items-start gap-8 px-10 flex-wrap">
    <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="bg-pink-100 p-4 rounded-xl w-80 shadow hover:shadow-lg transition">
        <h2 class="text-xl font-bold text-pink-600 mb-2">📋 Your Priority</h2>
        <div class="bg-white p-3 rounded shadow text-left text-sm">
            <p class="font-semibold">🎂 Birthday My Husband Sylus</p>
            <p>Pick up cake at 6PM from bakery</p>
            <p class="text-red-500 mt-2">Status: Not Started</p>
        </div>
    </a>
    <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="bg-pink-100 p-4 rounded-xl w-80 shadow hover:shadow-lg transition">
        <h2 class="text-xl font-bold text-pink-600 mb-2">📋 Completed</h2>
        <div class="bg-white p-3 rounded shadow text-left text-sm">
            <p class="font-semibold">🎂 Birthday My Husband Sylus</p>
            <p>Bought gift and done!</p>
            <p class="text-green-600 mt-2">Status: Completed</p>
        </div>
    </a>
    <div class="bg-pink-100 p-4 rounded-xl w-80 shadow text-center">
        <h2 class="text-xl font-bold text-pink-600 mb-4">Progress</h2>
        <div class="flex flex-row items-center gap-3 text-sm">
            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center border-4 border-green-500">84%</div>
            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center border-4 border-blue-500">46%</div>
            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center border-4 border-red-500">13%</div>
        </div>
    </div>
</div>
<script>
    function updateClock() {
        const clockElement = document.getElementById('realtime-clock');
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');
        clockElement.textContent = `${hours}:${minutes}:${seconds}`;
    }
    setInterval(updateClock, 1000);
    updateClock();
</script>
@endsection
