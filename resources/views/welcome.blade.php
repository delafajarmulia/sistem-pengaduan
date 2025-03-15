<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Anta&display=swap" rel="stylesheet">
        <title>Sistem Pengaduan</title>
        @vite('resources/css/app.css')

    </head>

    <style>
        .bg-leaf-bg {
            background-image: url(/assets/leaf-background.jpg);
        }
        .ph {
            display: inline-block;
            width: 50px;  /* Ukuran lebar ikon */
            height: 50px; /* Ukuran tinggi ikon */
            font-size: 50px; /* Ukuran font untuk ikon */
        }
        /* Segitiga di kanan, lebih besar, menghadap ke bawah secara default */
        details summary::after {
            content: "";
            @apply absolute right-0 top-1/2 transform -translate-y-1/2 border-solid;
            border-width: 6px; /* Ukuran segitiga yang lebih besar */
            border-color: black transparent transparent transparent; /* Menghadap ke bawah */
            transition: transform 0.3s ease;
        }

        /* Menghadap ke atas saat details dibuka */
        details[open] summary::after {
            transform: translateY(-50%) rotate(180deg);
        }
    </style>
    
    <body class="text-black">
        <div class="bg-leaf-bg bg-cover bg-center h-screen flex flex-col">

            <!-- Header Start -->
            <header class="absolute top-0 left-0 z-10 flex w-full items-center bg-transparent">
                <div class="container">
                    <div class="relative flex items-center justify-between lg:justify-start">
                        <div class="px-4 ml-3">
                            <a href="#home" class="block py-6 text-lg font-bold text-green-light lg:text-2xl">Sistem Pengaduan</a>
                        </div>
                        <div class="flex items-center px-4">
                            <button id="hamburger" name="hamburger" type="button" class="absolute right-4 block lg:hidden">
                                <span class="hamburger-line origin-top-left transition duration-300 ease-in-out"></span>
                                <span class="hamburger-line transition duration-300 ease-in-out"></span>
                                <span class="hamburger-line origin-bottom-left transition duration-300 ease-in-out"></span>
                            </button>

                            <nav 
                                id="nav-menu" 
                                class="absolute right-4 top-full hidden w-full max-w-[250px] rounded-lg bg-white-dark py-5 shadow-lg lg:static lg:block lg:max-w-full lg:rounded-none lg:bg-transparent lg:bg-opacity-0 lg:pt-6 lg:shadow-none"
                            >
                                <ul class="block lg:flex">  
                                    <li class="li-nav group">
                                        <a href="#commit" class="mx-8 flex py-2 text-base text-black lg:text-green-light lg:font-semibold group-hover:text-primary">Komitmen</a>
                                    </li>
                                    <li class="li-nav group">
                                        <a href="#spots" class="mx-8 flex py-2 text-base text-black lg:text-green-light lg:font-semibold group-hover:text-primary">Wisata</a>
                                    </li>
                                    <li class="li-nav group">
                                        <a href="#faq" class="mx-8 flex py-2 text-base text-black lg:text-green-light lg:font-semibold group-hover:text-primary">FAQ</a>
                                    </li>
                                    <li class="li-nav group">
                                        <a href="#contact" class="mx-8 flex py-2 text-base text-black lg:text-green-light lg:font-semibold group-hover:text-primary">Kontak</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Header End -->

            <div class="flex-grow flex items-center justify-center flex-col" id="home">
                <h1 class="font-custom text-white-dark font-bold text-center text-3xl md:text-5xl">
                    DESTINASI WISATA
                </h1>
                <div class="w-1/2 flex items-center justify-center mt-3">
                    <div class="text-green-light bg-white-dark px-5 pb-3.5 py-2 rounded-full font-semibold font-2xl">
                        <p class="text-center">
                            Laporkan kerusakan fasilitas pariwisata di Kabupaten Batang!
                        </p>
                        <p class="text-center">
                            Setiap laporan Anda adalah langkah menuju pariwisata yang lebih baik dan aman bagi semua.
                        </p>
                    </div>
                </div>
                <div class="mt-10">
                    <a href="{{ route('login') }}" class="text-green-light bg-white-dark px-5 pb-3.5 py-2 rounded-full font-semibold font-3xl hover:bg-opacity-25 hover:text-white-dark"> 
                        BUAT LAPORAN
                    </a>
                </div>
            </div>
        </div>

        <div id="commit" class="py-20 px-5 w-auto mx-auto md:w-3/4">
            <div class="mx-auto ">
                <h1 class="font-bold text-3xl">
                    Komitmen kami
                </h1>
                <div class="grid grid-cols-1 mx-auto lg:grid-cols-2 gap-6 mt-8">
                    @php
                        $commits = getCommits();
                    @endphp
                    @foreach ($commits as $commit)
                        <div class="flex flex-col text-center bg-gray bg-opacity-25 rounded-lg p-4 w-auto h-44 hover:shadow-xl shadow-gray">
                            <img src="{{ asset('assets/icons/'.$commit->icon) }}" alt="" class="w-12 h-12 mb-3 mx-auto mt-1">
                            <div>
                                <p class="font-bold text-xl">
                                    {{ $commit->point }}
                                </p>
                                <p>
                                    {{ $commit->description }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div id="invite" class="pt-0 pb-12 px-12 mx-auto md:w-3/4 md:pt-8 md:pb-24">
            <p class="text-center text-xl font-semibold">
                Laporkan kerusakan fasilitas pariwisata untuk bantu tingkatkan pengalaman wisata! 
                Dengan satu laporan, Anda berkontribusi untuk pariwisata yang lebih baik di Kabupaten Batang!
            </p>
        </div>

        <div id="spots" class="pt-0 pb-12 px-5 mx-auto md:w-3/4 md:pt-8 md:pb-24">
            <h1 class="font-bold text-3xl">
                Wisata Kami
            </h1>

            <div class="grid md:grid-cols-1 gap-4 lg:grid-cols-3 mt-2">
                @foreach ($spots as $spot)
                    <a href="{{ route('spot.detail', ['id'=>$spot->id]) }}">
                        <div
                            class="relative overflow-hidden group"
                        >
                            <img 
                                src="{{ asset('spots/'.$spot->image) }}" 
                                alt="{{ $spot->image }}"
                                class="w-full h-48 object-cover rounded-md md:h-64 lg:h-48 transition-transform duration-300 ease-in-out trnasform hover:scale-110"
                            >
                            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <p class="text-white-dark font-semibold text-lg">
                                  {{ $spot->name }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            <p class="text-right underline mt-1 pr-2 text-blue-dark hover:text-blue-light">
                <a 
                    href="{{ route('spots') }}"
                >
                    lihat semua
                </a>
            </p>
        </div>

        <div id="" class="pt-0 pb-12 px-5 mx-auto md:w-3/4 md:pt-8 md:pb-24">
            <h1 class="font-bold text-3xl text-center pb-4 mb-3">Aduan Masyarakat</h1>

            <div class="grid grid-cols-3 gap-3">
                @foreach ($complaints as $complaint)
                    <div class="h-fit p-2 rounded-md shadow-md shadow-gray hover:shadow-lg">
                        <div class="flex gap-2 mb-1.5">
                            <img src="https://www.w3schools.com/w3images/avatar2.png" class="w-8 h-8 rounded-full" alt="Avatar">
                            <p class="font-semibold my-auto">{{ censorName($complaint->user->name) }}</p>
                        </div>
                        @if ($complaint->image)
                            <div class="flex justify-center items-center">
                                <img 
                                    src="{{ asset('complaints/'.$complaint->image) }}" 
                                    alt="{{ $complaint->image }}"
                                    class="w-auto h-24 md:w-full md:h-full my-1 rounded-md"
                                >
                            </div>
                        @endif
                        <p>{{ $complaint->content }}</p>
                    </div>
                @endforeach
            </div>

            {{-- <div class="space-y-2 p-4">
                @foreach ($complaints as $complaint)
                    <div class="flex">
                        <div class="relative p-4 rounded-lg max-w-full text-black
                                    @if($complaint->id % 2 == 0) bg-green-light mr-auto @else bg-blue-light ml-auto @endif">
                            
                            <!-- Bubble Content -->
                            <p class="font-semibold">{{ censorName($complaint->user->name) }}</p>
                            <p>{{ $complaint->content }}</p>
            
                            <!-- Tail -->
                            <div class="absolute top-2 w-0 h-0"
                                style="
                                    border-top: 8px solid transparent;
                                    border-bottom: 8px solid transparent;
                                    @if($complaint->id % 2 == 0) 
                                        border-right: 8px solid #32CD32; left: -8px;
                                    @else 
                                        border-left: 8px solid #1E90FF; right: -8px;
                                    @endif
                                ">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> --}}
        </div>

        <div id="faq" class="py-5 px-9">
            <div class="w-full mx-auto mb-4 md:w-6/12">
                <h1 class="font-bold text-3xl text-center pb-4">
                    Ada pertanyaan?
                </h1>
                <p class="text-center">
                    Kami terbuka dengan pertanyaan apapun terkait Sistem Pengaduan. Sebelum Anda mengajukan pertanyaan, mungkin Anda bisa menemukan jawabannya di bawah ini :
                </p>
            </div>
            @php
                $FAQs = getFAQs();
            @endphp
            <div class="py-5 px-9 mx-auto md:w-11/12 lg:w-3/5 bg-white-dark rounded-md shadow-md shadow-gray">
                @foreach ($FAQs as $faq)
                    <details class="border-b border-gray py-3">
                        <summary class="flex items-center justify-between cursor-pointer pr-6 relative font-semibold text-green-dark">
                            {{ $faq->question }}
                        </summary>
                        <p class="mt-2">
                            {{ $faq->answer }}
                        </p>
                    </details>
                @endforeach
            </div>
        </div>

        <div id="contact" class="bg-gradient-to-r from-green-lighter via-green-light to-green-dark w-full px-5 py-7 mt-7 ">
            <div class="w-full md:w-3/4 mx-auto grid gap-4 grid-cols-1 lg:grid-cols-2">
                <div class="w-fit">
                    <h1 class="text-white-dark font-bold text-2xl md:text-3xl">
                        Sistem Pengaduan
                    </h1>
                    <div class="text-white-dark mt-1">
                        <p>Jl. RA Kartini No. 1 Batang</p>
                        <p>081993545573</p>
                        <p>disparpora@batangkab.go.id</p>
                        <p>pariwisata.batangkab.go.id</p>
                    </div>
                </div>
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3183.20886597735!2d109.72751776452944!3d-6.910077595013948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7024af0e11391f%3A0xef7ed8702b3c8520!2sDinas%20Pariwisata%20Kepemudaan%20Dan%20Olahraga%20Kabupaten%20Batang!5e0!3m2!1sid!2sid!4v1729996015469!5m2!1sid!2sid" 
                    class="border-none w-full h-auto md:h-72" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
            </div>
        </div>
    </body>

    <script>
        // Navbar Fixed
        window.onscroll = function () {
            const header = document.querySelector('header');
            const fixedNav = header.offsetTop;
            const toTop = document.querySelector('#to-top');
            const liNav = document.querySelectorAll('li-nav');

            if (window.pageYOffset > fixedNav) {
                header.classList.add('navbar-fixed');
                toTop.classList.remove('hidden');
                toTop.classList.add('flex');
                liNav.classList.add('text-black');
            } else {
                header.classList.remove('navbar-fixed');
                toTop.classList.remove('flex');
                toTop.classList.add('hidden');
            }
        };

        // Hamburger
        const hamburger = document.querySelector('#hamburger');
        const navMenu = document.querySelector('#nav-menu');

        hamburger.addEventListener('click', function () {
        hamburger.classList.toggle('hamburger-active');
        navMenu.classList.toggle('hidden');
        });

        // Klik di luar hamburger
        window.addEventListener('click', function (e) {
        if (e.target != hamburger && e.target != navMenu) {
            hamburger.classList.remove('hamburger-active');
            navMenu.classList.add('hidden');
        }
        });
    </script>
</html>
