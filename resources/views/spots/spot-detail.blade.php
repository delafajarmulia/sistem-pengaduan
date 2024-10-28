<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Pengaduan</title>
    @vite('resources/css/app.css')
</head>
<body class="text-black">
    @auth
        <x-navbar-auth />
    @endauth
    <div class="bg-cover bg-center h-screen flex justify-center items-center content-center h-screen" style="background-image: url('{{ asset('spots/'.$spot->image) }}')">
        <h1 class="text-white-dark font-bold text-3xl md:text-4xl">
            {{ $spot->name }}
        </h1>
    </div>
    <div class="flex mx-auto flex-col md:flex-row gap-x-9 gap-y-5 px-5 w-full md:w-3/4 my-9">
        <div>
            <p class="text-md">
                Alamat : {{ $spot->address }}
            </p>
        </div>
        <div>
            <p class="text-md">
                {{ $spot->description }}
            </p>
        </div>
    </div>

    <div class="flex justify-center items-center py-5 px-3 bg-green-light w-full">
        <iframe 
            src="{{ $spot->html_address }}" 
            frameborder="0"
            class="w-full md:w-3/4 md:h-52"
        ></iframe>
    </div>
</body>
</html>