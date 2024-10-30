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
    <x-navbar-auth />
    <div class="mt-4 md:mt-14 flex justify-center items-center text-black md:mb-20">
        <div class="flex-col p-5 w-11/12 mt-5 md:w-3/4 md:shadow-2xl shadow-gray px-7">
            <h1 class="text-2xl font-bold pt-8 text-center md:pt-1">
                Buat Pengaduan
            </h1>
            <div class="flex flex-col justify-center items-center">
                <p class="text-center">
                    @auth
                        Hallo {{ auth()->user()->name }} 👋🏻...
                    @endauth
                </p>
                <p class="text-center">
                    Memiliki keluhan? Jangan ragu untuk melaporkan yaa
                </p>
            </div>

            <form action="{{ route('complaint.post') }}" method="post" enctype="multipart/form-data" class="flex flex-col justify-center">
                @csrf
                <div class="w-4/5 mx-auto py-0 5">
                    <label for="">Gambar (opsional)</label>
                    <input type="file" name="image" class="border border-gray rounded-md w-full px-2 py-1 pb-2 @error('image') bg-red opacity-50 @enderror">
                    @error('image')
                        <p class="text-xs text-red">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="w-4/5 mx-auto py-0.5">
                    <label for="">Kategori Pengaduan</label>
                    <select name="category" id="" class="border border-gray rounded-md w-full px-2 py-1 pb-2" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-4/5 mx-auto py-0.5">
                    <label for="">Lokasi</label>
                    <select name="spot" id="" class="border border-gray rounded-md w-full px-2 py-1 pb-2" required>
                        @foreach ($spots as $spot)
                            <option value="{{ $spot->id }}">{{ $spot->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-4/5 mx-auto py-0.5">
                    <label for="">Isi Pengaduan</label>
                    <textarea name="content" id="" class="border border-gray rounded-md w-full px-2 py-1 pb-2 h-32" required></textarea>
                    @error('content')
                        <p class="text-xs text-red">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="w-4/5 mx-auto py-0.5">
                    <button type="submit" class="w-full py-1.5 pb-2.5 mt-5 mb-1 rounded-md text-white-dark font-semibold bg-green-light hover:bg-green-dark">
                        Buat Aduan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>