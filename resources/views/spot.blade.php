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
    <div class="py-20 px-5 w-auto mx-auto md:w-3/4">
        <div class="grid grid-cols-1 gap-6 mt-8 flex justify-center items-center md:grid-cols-2">
            @foreach ($spots as $spot)
                <div class="w-auto min-h-96 shadow-md shadow-gray px-5 py-5 rounded-md hover:shadow-2xl">
                    <img src="{{ asset('/spots/'.$spot->image) }}" alt="{{ $spot->image }}" class="w-auto rounded-md">
                    <div class="mt-2">
                        <h1 class="font-semibold text-lg">
                            {{ $spot->name }}
                        </h1>
                        <p>
                            {{ $spot->address }}
                        </p>
                    </div>
                    <div class="mt-2">
                        @auth
                            @if (auth()->user()->role === 'admin')
                                <a href="{{ route('dashboard') }}">
                                    <button class="w-full py-1 bg-green-ligth text-white-dark rounded-md">Edit wisata</button>
                                </a>
                                <a href="{{ route('dashboard') }}">
                                    <button class="w-full py-1 bg-green-ligth text-white-dark rounded-md mt-1.5">Lihat detail</button>
                                </a>
                            @else
                                <a href="{{ route('dashboard') }}">
                                    <button class="w-full py-1 bg-green-ligth text-white-dark rounded-md mt-1.5">Lihat detail</button>
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>