@extends('components.layout')

@section('content')
<div class="text-center py-12 bg-pink-100 rounded-2xl mx-6 shadow-md">
    <h1 class="text-4xl text-pink-600 font-extrabold mb-4">Welcome {{ $username ?? 'Guest' }}</h1>

    <div class="flex justify-center">
        <img src="https://i.pinimg.com/736x/49/e8/5f/49e85f7dc65d4d5926a76717fea13d14.jpg"
             alt="Hero Image"
             class="w-52 h-52 object-cover rounded-full border-4 border-pink-300 shadow-lg">
    </div>

    <p class="text-pink-500 mt-4 text-lg">Tracking your activity, be productive with <span class="font-bold">Mega!</span></p>
</div>
<div class="flex justify-center items-start gap-8 px-10 flex-wrap">
    <!-- Your Priority -->
    <div class="bg-pink-100 p-4 rounded-xl w-80 shadow">
        <h2 class="text-xl font-bold text-pink-600 mb-2">📋 Your Priority</h2>
        <div class="bg-white p-3 rounded shadow text-left text-sm">
            <p class="font-semibold">🎂 Birthday My Husband Stylus</p>
            <p>Pick up cake at 6PM from bakery</p>
            <p class="text-red-500 mt-2">Status: Not Started</p>
        </div>
    </div>

    <!-- Completed -->
    <div class="bg-pink-100 p-4 rounded-xl w-80 shadow">
        <h2 class="text-xl font-bold text-pink-600 mb-2">📋 Completed</h2>
        <div class="bg-white p-3 rounded shadow text-left text-sm">
            <p class="font-semibold">🎂 Birthday My Husband Stylus</p>
            <p>Bought gift and done!</p>
            <p class="text-green-600 mt-2">Status: Completed</p>
        </div>
    </div>

    <!-- Progress -->
    <div class="bg-pink-100 p-4 rounded-xl w-80 shadow text-center">
        <h2 class="text-xl font-bold text-pink-600 mb-4">Progress</h2>
        <div class="flex flex-col items-center gap-3 text-sm">
            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center border-4 border-green-500">84%</div>
            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center border-4 border-blue-500">46%</div>
            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center border-4 border-red-500">13%</div>
        </div>
    </div>
</div>
@endsection
