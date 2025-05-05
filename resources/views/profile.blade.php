@extends('components.layout')
@section('title', 'Profile')
@section('content')
<div class="text-center py-12 bg-pink-200 rounded-2xl m-6 shadow-md">
    <h1 class="text-4xl text-pink-600 font-bold mb-4">My Profile</h1>
    <p class="text-lg text-pink-600">Hi, {{ $username }}!</p>
    <div class="flex justify-center my-6">
        <div class="bg-pink-300 p-6 rounded-xl shadow-lg w-1/4">
            <img src="{{ asset('image/MEGAVERSE.png') }}"
                 alt="Profile Picture"
                 class="w-24 h-24 object-cover rounded-full border-4 border-pink-600 mx-auto mb-4">
            <p class="text-xl text-pink-600 font-bold">{{ $username }}</p>
            <div class="mt-6">
                <div class="flex justify-between text-pink-600 text-sm mb-2">
                    <span>Tugas Selesai:</span>
                    <span class="text-pink-600">{{ $completedTasks ?? 0 }}</span>
                </div>
                <div class="flex justify-between text-pink-600 text-sm mb-2">
                    <span>Tugas Belum Selesai:</span>
                    <span class="text-pink-600">{{ $pendingTasks ?? 0 }}</span>
                </div>
                <div class="flex justify-between text-pink-600 text-sm">
                    <span>Tugas Prioritas:</span>
                    <span class="pink-600">{{ $priorityTasks ?? 0 }}</span>
                </div>
            </div>
            <button onclick="showLogoutModal()" class="mt-6 bg-pink-600 text-white py-2 px-6 rounded-lg hover:bg-pink-700">
                Logout
            </button>
        </div>
        <div id="logoutModal" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden">
            <div class="bg-pink-300 p-6 rounded-xl shadow-lg w-1/3">
                <h2 class="text-2xl text-pink-600 font-bold text-center mb-4">Konfirmasi Logout</h2>
                <p class="text-pink-600 text-center mb-6">Apakah Anda yakin ingin logout?</p>
                <div class="flex justify-center gap-4">
                    <button onclick="logout()"
                            class="bg-pink-600 text-white py-2 px-6 rounded-lg hover:bg-pink-700">
                        Oke
                    </button>
                    <button onclick="hideLogoutModal()"
                            class="bg-gray-200 text-pink-600 py-2 px-6 rounded-lg hover:bg-gray-300">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
        <script>
            function showLogoutModal() {
                document.getElementById('logoutModal').classList.remove('hidden');
            }

            function hideLogoutModal() {
                document.getElementById('logoutModal').classList.add('hidden');
            }

            function logout() {
                window.location.href = "{{ route('login') }}";
            }
        </script>
    </div>
</div>
@endsection
