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
    <x-navbar-auth-public />
    <div class="mt-20 flex justify-center items-center text-black">
        <div class="w-full p-5 ">
            <h1 class="text-2xl font-bold pt-8 text-center md:pt-1">
                Buat Pengaduan
            </h1>
            
            <div class="flex flex-col justify-center items-center">
                <p class="text-center">
                    @auth
                        Hallo {{ auth()->user()->name }}👋🏻...
                    @endauth
                </p>
                <p class="text-center">
                    Memiliki keluhan? Jangan ragu untuk melaporkan yaa
                </p>
                <div class="mt-3 w-3/4 bg-red bg-opacity-75 rounded-md">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <li class="py-1 px-3 text-white-strong">{{ $error }}</li>
                        @endforeach
                    @endif
                </div>
            </div>


            <div class="flex justify-center items-center mt-3 w-auto bg-green-300 rounded-md">
                @if (session('success'))
                    <p class="py-1 px-3 text-white">{{ session('success') }}</p>
                @endif
            </div>

            <form action="{{ route('complaint.post') }}" method="post" class="flex flex-col justify-center">
                @csrf
                <div class="w-4/5 mx-auto py-0.5">
                    <label for="">Kategori Pengaduan</label>
                    <select name="category" id="" class="border border-gray rounded-md w-full px-2 py-1 pb-2" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-4/5 mx-auto py-0.5">
                    <label for="">Isi Pengaduan</label>
                    <textarea name="isi_pengaduan" id="" cols="" rows="" class="border border-gray rounded-md w-full px-2 py-1 pb-2 h-32" required></textarea>
                </div>
                <div class="w-4/5 mx-auto py-0.5">
                    <button type="submit" class="w-full py-1.5 pb-2.5 mt-5 mb-1 rounded-md text-white-strong font-semibold bg-green-weak hover:bg-green-strong">
                        Buat Aduan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>