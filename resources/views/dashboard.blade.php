@extends('layout')
@section('title', 'Dashboard')
@section('content')
<h1 class="text-2xl font-bold">Selamat datang, {{ $username }}</h1>
<p class="mt-4">Ini adalah halaman Dashboard Anda.</p>
@endsection



// resources/views/pengelolaan.blade.php
@extends('layout')
@section('title', 'Pengelolaan')
@section('content')
<h1 class="text-2xl font-bold mb-4">Pengelolaan Tugas</h1>
<table class="table-auto w-full bg-white shadow-md rounded">
    <thead class="bg-gray-200">
        <tr>
            <th class="px-4 py-2">Judul Tugas</th>
            <th class="px-4 py-2">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
        <tr>
            <td class="border px-4 py-2">{{ $task['title'] }}</td>
            <td class="border px-4 py-2">{{ $task['status'] }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
