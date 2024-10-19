<nav class="fixed w-full top-0 bg-gray-800 p-4 z-10">
    <div class="container mx-auto flex flex-col md:flex-row md:justify-between items-start md:items-center px-5">
        <!-- Bagian Nama Aplikasi dan Hamburger -->
        <div class="flex justify-between items-center w-full md:w-auto">
            <a href="{{ route('dashboard') }}" class="text-white text-xl font-bold">Sistem Pengaduan</a>

            <!-- Toggle Button for Mobile (Hamburger Icon) -->
            <button id="menuToggle" class="text-white md:hidden focus:outline-none ml-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>

        <!-- Menu Link untuk Desktop -->
        <div id="desktopMenu" class="hidden md:flex md:items-center md:space-x-1 mt-2 md:mt-0 md:ml-5">
            <a href="{{ route('complaint') }}" class="rounded-md px-3 py-2 text-gray-300 font-medium hover:text-white {{ Route::is('complaint') ? 'text-white bg-gray-700' : '' }}">Cetak laporan</a>
            <a href="{{ route('spot') }}" class="rounded-md px-1 py-2 text-gray-300 font-medium hover:text-white {{ Route::is('spot') ? 'text-white bg-gray-700' : '' }}">Tambah wisata</a>
        </div>

        <!-- Menu Link untuk Mobile (hidden by default) -->
        <div id="mobileMenu" class="hidden md:hidden flex-col space-y-0 w-full text-left">
            <a href="{{ route('complaint') }}" class="rounded-md px-0 py-2 text-gray-300 font-medium hover:text-white {{ Route::is('complaint') ? 'text-white bg-gray-700' : '' }}">Cetak laporan</a>
            <a href="{{ route('spot') }}" class="rounded-md px-1 py-2 text-gray-300 font-medium hover:text-white {{ Route::is('spot') ? 'text-white bg-gray-700' : '' }}">Tambah wisata</a>
        </div>


        <!-- Profil Dropdown -->
        <div class="relative mt-2 md:mt-0 ml-auto">
            <button id="profileDropdownButton" class="flex items-center space-x-2 text-white focus:outline-none">
                <img src="https://www.w3schools.com/w3images/avatar2.png" class="w-8 h-8 rounded-full" alt="Avatar">
                <span>{{ Auth::user()->name }}</span>
            </button>

            <!-- Dropdown -->
            <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 hidden z-20">
                <a href="{{ route('profile', ['id'=>Auth::user()->id]) }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Profile</a> 
                <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Logout</a> 
            </div>
        </div>
    </div>
</nav>

<script>
    // Toggle the mobile menu
    document.getElementById('menuToggle').addEventListener('click', function () {
        const menu = document.getElementById('mobileMenu');
        menu.classList.toggle('hidden');
    });

    // Toggle the profile dropdown
    document.getElementById('profileDropdownButton').addEventListener('click', function () {
        const dropdown = document.getElementById('profileDropdown');
        dropdown.classList.toggle('hidden');
    });
</script>
