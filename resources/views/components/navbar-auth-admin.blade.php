<nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center px-5">
        <div>
            <a href="{{ route('dashboard') }}" class="text-white text-xl font-bold pr-5">Sistem Pengaduan</a>
            <a href="{{ route('complaint') }}" class="text-gray-300 hover:text-white {{ Route::is('home') ? 'text-white' : '' }}">Cetak Laporan</a>
        </div>

        <!-- Menu Link -->
        <div class="flex space-x-4">
            
        </div>

        <!-- Profil Dropdown -->
        <div class="relative">
            <button id="profileDropdownButton" class="flex items-center space-x-2 text-white focus:outline-none">
                <img src="https://www.w3schools.com/w3images/avatar2.png" class="w-8 h-8 rounded-full" alt="Avatar">
                <span>{{ Auth::user()->name }}</span>
            </button>

            <!-- Dropdown (hidden by default) -->
            <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 hidden">
                <a href="{{ route('profile', ['id'=>Auth::user()->id]) }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Profile</a> 
                <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Logout</a> 
            </div>
        </div>
    </div>
</nav>

<script>
    document.getElementById('profileDropdownButton').addEventListener('click', function () {
        const dropdown = document.getElementById('profileDropdown');
        dropdown.classList.toggle('hidden');
    });
</script>