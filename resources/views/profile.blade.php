// resources/views/profile.blade.php
@extends('layout')
@section('title', 'Profile')
@section('content')
<h1 class="text-2xl font-bold">Profile</h1>
<p class="mt-4">Nama pengguna: {{ $username }}</p>
@endsection
