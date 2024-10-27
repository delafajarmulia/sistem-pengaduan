<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Pengaduan</title>
    @vite('resources/css/app.css')
</head>
<body>
    @auth
        @if (auth()->user()->role === 'admin')
            <x-navbar-auth-admin />
        @else
            <x-navbar-auth-public />
        @endif
    @endauth
    <div class="py-5 px-5 pt-32 md:pt-28 w-auto mx-auto text-black md:w-3/4">
        <h1 class="text-center font-bold pb-5 text-2xl">Daftar Wisata</h1>
        <div class="grid grid-cols-1 gap-6 mt-2 flex justify-center items-center lg:grid-cols-2">
            @foreach ($spots as $spot)
                <div class="w-auto min-h-72 shadow-md shadow-gray px-5 py-5 rounded-md hover:shadow-2xl">
                    <a href="{{ route('spot.detail', ['id'=>$spot->id]) }}">
                        <img 
                            src="{{ asset('/spots/'.$spot->image) }}" 
                            alt="{{ $spot->image }}" 
                            class="w-full rounded-md h-48 md:h-64 lg:h-64"
                        >
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
                                    <a href="{{ route('spot.form.edit', ['id'=>$spot->id]) }}">
                                        <button class="w-full py-1 bg-green-light text-white-dark rounded-md">Edit wisata</button>
                                    </a>
                                @endif
                            @endauth
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        {{-- <div class="grid md:grid-cols-1 gap-4 lg:grid-cols-3">
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
        </div> --}}
    </div>
</body>
</html>