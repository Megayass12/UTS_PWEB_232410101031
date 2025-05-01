@extends('components.layout')
@section('title', 'Login')
@section('content')
<div class="max-w-md mx-auto bg-white p-8 shadow-md">
    <form action="{{ route('authenticate') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="username" class="block text-sm font-medium">Username</label>
            <input type="text" id="username" name="username" class="w-full border border-gray-300 p-2 rounded">
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium">Password</label>
            <input type="password" id="password" name="password" class="w-full border border-gray-300 p-2 rounded">
        </div>
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Login</button>
    </form>
</div>
@endsection
