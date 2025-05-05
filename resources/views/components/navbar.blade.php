<nav class="bg-pink-300 flex justify-between items-center px-6 py-4 text-white shadow">
    <div class="flex gap-4">
        <a href="{{ route('dashboard', ['username' => $username]) }}"
           class="{{ Route::currentRouteName() == 'dashboard' ? 'bg-white text-pink-600' : 'bg-pink-500 hover:bg-pink-600' }} transition px-4 py-2 rounded-full font-bold">
            Dashboard
        </a>
        <a href="{{ route('pengelolaan', ['username' => $username]) }}"
           class="{{ Route::currentRouteName() == 'pengelolaan' ? 'bg-white text-pink-600' : 'bg-pink-400 hover:bg-pink-500' }} transition px-4 py-2 rounded-full font-bold">
            My List
        </a>
    </div>
    <div>
        <a href="{{ route('profile', ['username' => $username]) }}" class="hover:opacity-80 transition">
            <img src="{{ asset('image/MEGAVERSE.png') }}" alt="Profile" class="w-14 h-14">
        </a>
    </div>
</nav>
