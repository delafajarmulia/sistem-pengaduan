<nav class="fixed w-full top-0 bg-white-dark bg-opacity-70 backdrop-blur-sm dark:bg-opacity-50 p-4 z-10">
    <div class="container mx-auto flex flex-col md:flex-row md:justify-between items-start md:items-center px-5">
        <!-- Bagian Nama Aplikasi dan Hamburger -->
        <div class="flex justify-between items-center w-full md:w-auto">
            <a href="{{ auth()->check() ? route('dashboard') : route('main') }}" class="text-lg font-bold text-green-light lg:text-2xl">Sistem Pengaduan</a>

            <!-- Toggle Button for Mobile (Hamburger Icon) -->
            <button id="menuToggle" class="md:hidden focus:outline-none ml-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>

        @auth
            @if (auth()->user()->role === 'admin')
                <!-- Menu Link untuk Desktop -->
                <div id="desktopMenu" class="hidden md:flex md:items-center md:space-x-1 mt-2 md:mt-0 md:ml-5">
                    {{-- <a href="{{ route('spot.form.add') }}" class="rounded-md px-1 py-2 font-medium {{ Route::is('spot.form.add') ? 'bg-white-light bg-opacity-25 px-3 py-0.5 pb-1.5' : '' }}">Tambah wisata</a> --}}
                    <a href="{{ route('spots') }}" class="rounded-md px-1 py-2 font-medium {{ Route::is('spots') ? 'bg-white-light bg-opacity-25 px-3 py-0.5 pb-1.5' : '' }}">Daftar wisata</a>
                    <a href="{{ route('user.form.add') }}" class="rounded-md px-1 py-2 font-medium {{ Route::is('user.form.add') ? 'bg-white-light bg-opacity-25 px-3 py-0.5 pb-1.5' : '' }}">Tambah pengguna</a>
                    <a href="{{ route('users') }}" class="rounded-md px-1 py-2 font-medium {{ Route::is('users') ? 'bg-white-light bg-opacity-25 px-3 py-0.5 pb-1.5' : '' }}">Daftar pengguna</a>
                    <a href="{{ route('print.report') }}" class="rounded-md px-1 py-2 font-medium {{ Route::is('print.report') ? 'bg-white-light bg-opacity-25 px-3 py-0.5 pb-1.5' : '' }}">Cetak laporan</a>
                </div>
            @else
                <!-- Menu Link untuk Desktop -->
                <div id="desktopMenu" class="hidden md:flex md:items-center md:space-x-1 mt-2 md:mt-0 md:ml-5">
                    <a href="{{ route('complaint') }}" class="rounded-md px-1 py-2 font-medium {{ Route::is('complaint') ? 'bg-white-light bg-opacity-25 px-3 py-0.5 pb-1.5' : '' }}">Buat pengaduan</a>
                    <a href="{{ route('spots') }}" class="rounded-md px-1 py-2 font-medium {{ Route::is('spots') ? 'bg-white-light bg-opacity-25 px-3 py-0.5 pb-1.5' : '' }}">Daftar wisata</a>
                </div>
            @endif
        @endauth

        @auth
            @if (auth()->user()->role === 'admin')
                <!-- Menu Link untuk Mobile (hidden by default) -->
                <div id="mobileMenu" class="hidden mt-2 md:hidden flex flex-col w-full text-left">
                    {{-- <a href="{{ route('spot.form.add') }}" class="rounded-md px-0 py-2 font-medium {{ Route::is('spot.form.add') ? 'bg-white-light bg-opacity-25 px-3 py-0 pb-1.5' : '' }}">Tambah wisata</a> --}}
                    <a href="{{ route('spots') }}" class="rounded-md px-0 py-2 font-medium {{ Route::is('spots') ? 'bg-white-light bg-opacity-25 px-3 py-0 pb-1.5' : '' }}">Daftar wisata</a>
                    <a href="{{ route('user.form.add') }}" class="rounded-md px-0 py-2 font-medium {{ Route::is('user.form.add') ? 'bg-white-light bg-opacity-25 px-3 py-0 pb-1.5' : '' }}">Tambah pengguna</a>
                    <a href="{{ route('users') }}" class="rounded-md px-0 py-2 font-medium {{ Route::is('users') ? 'bg-white-light bg-opacity-25 px-3 py-0 pb-1.5' : '' }}">Daftar pengguna</a>
                    <a href="{{ route('profile', ['id'=>Auth::user()->id]) }}" class="rounded-md px-0 py-2 font-medium {{ Route::is('profile') ? 'bg-white-light bg-opacity-25 px-3 py-0 pb-1.5' : '' }}">Profile</a>
                    <a href="{{ route('logout') }}" class="rounded-md px-0 py-2 font-medium">Logout</a>
                    <a href="{{ route('print.report') }}" class="rounded-md px-0 py-2 font-medium {{ Route::is('print.report') ? 'bg-white-light bg-opacity-25 px-3 py-0 pb-1.5' : '' }}">Cetak laporan</a>
                </div>
            @else
                <!-- Menu Link untuk Mobile (hidden by default) -->
                <div id="mobileMenu" class="hidden mt-2 md:hidden flex flex-col w-full text-left">
                    <a href="{{ route('complaint') }}" class="rounded-md px-0 py-2 font-medium {{ Route::is('complaint') ? 'bg-white-light bg-opacity-25 px-3 py-0 pb-1.5' : '' }}">Buat pengaduan</a>
                    <a href="{{ route('spots') }}" class="rounded-md px-0 py-2 font-medium {{ Route::is('spots') ? 'bg-white-light bg-opacity-25 px-3 py-0 pb-1.5' : '' }}">Daftar wisata</a>
                    <a href="{{ route('profile', ['id'=>Auth::user()->id]) }}" class="rounded-md px-0 py-2 font-medium {{ Route::is('profile') ? 'bg-white-light bg-opacity-25 px-3 py-0 pb-1.5' : '' }}">Profile</a>
                    <a href="{{ route('logout') }}" class="rounded-md px-0 py-2 font-medium">Logout</a>
                </div>
            @endif
        @endauth

        @auth
            <!-- Profil Dropdown untuk Desktop -->
            <div class="relative mt-2 md:mt-0 ml-auto hidden md:flex">
                <button id="profileDropdownButton" class="flex items-center space-x-2 focus:outline-none">
                    <img src="https://www.w3schools.com/w3images/avatar2.png" class="w-8 h-8 rounded-full" alt="Avatar">
                    <span>{{ Auth::user()->name }}</span>
                </button>

                <!-- Dropdown -->
                <div id="profileDropdown" class="absolute right-0 mt-2 w-48 bg-white-dark rounded-md shadow-lg py-2 hidden z-20">
                    <a href="{{ route('profile', ['id'=>Auth::user()->id]) }}" class="block px-4 py-2 text-black hover:bg-white-light">Profile</a> 
                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-black hover:bg-white-light">Logout</a> 
                </div>
            </div>
        @endauth
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


{{-- <style>
    .navbar-fixed {
        @apply fixed z-[9999] bg-white-dark bg-opacity-70 backdrop-blur-sm dark:bg-opacity-50;
        box-shadow: inset 0 -1px 0 0 rgba(0, 0, 0, 0.2);
    }
</style> --}}