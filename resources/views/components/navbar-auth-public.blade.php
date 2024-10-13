<nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-white text-xl font-bold">
            <a href="/">Sistem Pengaduan</a>
        </div>

        <!-- Profil Dropdown -->
        <div class="relative">
            <button id="profileDropdownButton" class="flex items-center space-x-2 text-white focus:outline-none">
                <img src="https://www.w3schools.com/w3images/avatar2.png" class="w-8 h-8 rounded-full" alt="Avatar">
                <span>{{ Auth::user()->name }}</span>
            </button>

            <!-- Dropdown (hidden by default) -->
            <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 hidden">
                <a href="" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Profile</a> 
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