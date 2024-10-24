<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistem Pengaduan</title>
        @vite('resources/css/app.css')
        {{-- <link rel="stylesheet" href="{{ mix('css/app.css') }}"> --}}
        <link rel="stylesheet" href="https://unpkg.com/phosphor-icons@latest/src/styles.css" />

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
            /* color: black; Ubah warna ikon untuk melihatnya */
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
                <a href="{{ route('login') }}" class="text-green-ligth bg-white-dark px-5 pb-3.5 py-2 rounded-full font-semibold font-2xl hover:bg-opacity-25 hover:text-white-dark"> <!-- hover:border border-3 border-white-dark-->
                    Buat Laporan
                </a>
            </div>
        </div>

        <div class="py-20 px-5 w-auto mx-auto md:w-3/4">
            <div class="mx-auto ">
                <h1 class="font-bold text-4xl">
                    Komitmen kami
                </h1>
                <div class="grid grid-cols-1 gap-6 mt-8 flex justify-center items-center md:grid-cols-2">
                    <div class="flex flex-col text-center bg-gray bg-opacity-25 rounded-lg p-4 w-auto h-48 hover:shadow-xl shadow-gray">
                        <img src="{{ asset('assets/icons/timer.svg') }}" alt="" class="w-12 h-12 mb-3 mx-auto mt-1">
                        <div>
                            <p class="font-bold text-xl">Cepat dan Tepat</p>
                            <p>Menjamin respons cepat terhadap laporan.</p>
                        </div>
                    </div>
                    <div class="flex flex-col text-center bg-gray bg-opacity-25 rounded-lg p-4 w-auto h-48 hover:shadow-xl shadow-gray">
                        <img src="{{ asset('assets/icons/eye.svg') }}" alt="" class="w-12 h-12 mb-3 mx-auto">
                        <div>
                            <p class="font-bold text-xl">Transparan</p>
                            <p>Menyediakan transparansi dalam proses perbaikan.</p>
                        </div>
                    </div>
                    <div class="flex flex-col text-center bg-gray bg-opacity-25 rounded-lg p-4 w-auto h-48 hover:shadow-xl shadow-gray">
                        <img src="{{ asset('assets/icons/chats.svg') }}" alt="" class="w-12 h-12 mb-3 mx-auto">
                        <div>
                            <p class="font-bold text-xl">Partisipatif</p>
                            <p>Mengajak masyarakat untuk terlibat aktif dalam menjaga fasilitas pariwisata.</p>
                        </div>
                    </div>
                    <div class="flex flex-col text-center bg-gray bg-opacity-25 rounded-lg p-4 w-auto h-48 hover:shadow-xl shadow-gray">
                        <img src="{{ asset('assets/icons/seal-check.svg') }}" alt="" class="w-12 h-12 mb-3 mx-auto">
                        <div>
                            <p class="font-bold text-xl">Aman dan Terpercaya</p>
                            <p>Menyediakan sistem yang aman dan dapat diandalkan untuk melaporkan kerusakan dengan kerahasiaan terjaga.</p>
                        </div>
                    </div>
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
                Wisata kami
            </h1>
        </div>

        <details>
            <summary>test</summary>
            <p>Nikmati keindahan alam yang memikat, mulai dari pantai Ujungnegoro hingga air terjun Curug Genting. Kabupaten Batang di Jawa Tengah menawarkan pengalaman wisata yang tak terlupakan. 
                Ayo jelajahi sekarang dan rasakan keindahannya!</p>
        </details>

        {{-- @foreach ($spots as $spot)
            <img src="{{ asset('spots/'.$spot->image) }}" alt="" style="width: 150px">
        @endforeach --}}

        {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
    </body>
</html>
