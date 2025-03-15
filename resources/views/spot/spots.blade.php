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
        <x-navbar-auth />
    @endauth
    @guest
        <x-navbar />
    @endguest
    <div class="py-5 px-5 mt-14 md:mt-3 md:pt-28 w-auto mx-auto text-black md:w-3/4">
        <h1 class="text-center font-bold pb-5 text-2xl">Daftar Wisata</h1>
        @if (session('success'))
            <p class="w-full p-4 mb-4 mt-5 bg-green-light opacity-75 text-white-dark font-semibold rounded-lg">
                {{ session('success') }}
            </p>
        @endif
        @auth
            @if (auth()->user()->role === 'admin')
                <a href="{{ route('spot.form.add') }}" class="flex justify-end text-white-light mb-3">
                    <div class="bg-green-light px-2 pt-1 pb-1.5 rounded-md">Tambah wisata</div>
                </a>
            @endif
        @endauth
        <div class="grid grid-cols-1 gap-6 mt-2 justify-center items-center lg:grid-cols-2">
            @foreach ($spots as $spot)
                <div class="w-auto min-h-72 shadow-md shadow-gray px-5 py-5 rounded-md hover:shadow-lg">
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
                        <div class="mt-2 flex flex-wrap w-full gap-2">
                            @auth
                                @if (auth()->user()->role === 'admin')
                                    <a href="{{ route('spot.form.edit', ['id'=>$spot->id]) }}">
                                        <button class="px-3 py-1 bg-green-light text-white-dark rounded-md">Edit wisata</button>
                                    </a>
                                    <form action="{{ route('spot.delete', ['id'=>$spot->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="px-3 py-1 bg-red text-white-dark rounded-md">Hapus wisata</button>
                                    </form>
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