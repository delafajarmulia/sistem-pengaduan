<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
        <div class="bg-leaf-bg bg-cover bg-center h-screen flex items-center justify-center flex-col">
            <h1 class="text-white-dark font-bold text-center text-5xl">
                BATANG
            </h1>
            <div class="w-1/2 flex items-center justify-center mt-3">
                {{-- <p class="text-white-dark text-center font-2xl">
                    Kami berkomitmen untuk menjaga kenyamanan dan keamanan wisatawan. 
                    Jika Anda menemukan kerusakan pada fasilitas pariwisata, jangan ragu untuk melaporkannya. Setiap laporan sangat berarti untuk meningkatkan pengalaman wisata di Batang. 
                    Bersama-sama, kita wujudkan pariwisata yang lebih baik!
                </p> --}}
                <p class="text-white-dark text-center font-2xl font-semibold">
                    Laporkan kerusakan fasilitas pariwisata di Kabupaten Batang! Setiap laporan Anda adalah langkah menuju pariwisata yang lebih baik dan aman bagi semua.
                </p>
            </div>
            <div class="mt-4">
                <a href="{{ route('login') }}" class="text-green-light bg-white-dark px-5 pb-3.5 py-2 rounded-full font-semibold font-2xl hover:bg-opacity-25 hover:text-white-dark"> <!-- hover:border border-3 border-white-dark-->
                    Buat Laporan
                </a>
            </div>
        </div>

        <div class="py-20 px-5 w-auto mx-auto md:w-3/4">
            <div class="mx-auto ">
                <h1 class="font-bold text-4xl">
                    Komitmen Kami
                </h1>
                <div class="grid grid-cols-1 gap-6 mt-8 flex justify-center items-center md:grid-cols-2">
                    @php
                        $commits = getCommits();
                    @endphp
                    @foreach ($commits as $commit)
                        <div class="flex flex-col text-center bg-gray bg-opacity-25 rounded-lg p-4 w-auto h-48 hover:shadow-xl shadow-gray">
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

        <div class="pt-0 pb-12 px-12 mx-auto md:w-3/4 md:pt-8 md:pb-24">
            <p class="text-center text-xl font-semibold">
                Laporkan kerusakan fasilitas pariwisata untuk bantu tingkatkan pengalaman wisata! 
                Dengan satu laporan, Anda berkontribusi untuk pariwisata yang lebih baik di Kabupaten Batang!
            </p>
        </div>

        <div class="pt-0 pb-12 px-5 mx-auto md:w-3/4 md:pt-8 md:pb-24">
            <h1 class="font-bold text-4xl">
                Wisata Kami
            </h1>
            <p class="text-right pr-2 text-blue-dark hover:text-blue-light md:pb-1">
                <a 
                    href="{{ route('spots') }}"
                >
                    lihat semua
                </a>
            </p>
            <div class="grid md:grid-cols-1 gap-4 lg:grid-cols-3 gap-4">
                @foreach ($spots as $spot)
                    <div class="w-full px-3.5 py-5 bg-white-dark rounded-md shadow-md shadow-gray hover:shadow-xl shadow-gray">
                        <img 
                            src="{{ asset('spots/'.$spot->image) }}" 
                            alt="{{ $spot->image }}"
                            class="w-full h-48 rounded-md md:h-56"
                        >
                        <h1 class="pt-2 font-semibold text-md">
                            {{ $spot->name }}
                        </h1>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="py-5 px-9">
            <div class="w-full mx-auto mb-4 md:w-6/12">
                <h1 class="font-bold text-3xl text-center pb-4">
                    Ada Pertanyaan?
                </h1>
                <p class="text-center">
                    Kami terbuka dengan pertanyaan apapun terkait Sistem Pengaduan. Sebelum Anda mengajukan pertanyaan, mungkin Anda bisa menemukan jawabannya di bawah ini.
                </p>
            </div>
            @php
                $FAQs = getFAQs();
            @endphp
            <div class="py-5 px-9 mx-auto md:w-3/5 bg-white-dark rounded-md shadow-md shadow-gray">
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

        <div class="bg-gradient-to-r from-green-lighter via-green-light to-green-dark w-full px-5 py-7 mt-5">
            <p>Sistem Pengaduan</p>
        </div>
    </body>
</html>
