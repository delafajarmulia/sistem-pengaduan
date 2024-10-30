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
    <div class="mt-4 md:mt-14 flex justify-center items-center text-black">
        <div class="flex-col p-5 w-11/12 mt-5 md:w-3/4 md:shadow-2xl shadow-gray px-7 md:mb-9">
            <h1 class="text-2xl font-bold pt-8 text-center md:pt-1">
                Edit Tempat Wisata
            </h1>

            @if (session('success'))
                <div class="mt-3 mx-auto w-auto bg-green-light opacity-75 rounded-md md:3/4">
                    <p class="text-white-dark py-1.5 px-3 md:px-5">{{ session('success') }}</p>
                </div>
            @endif

            <form action="{{ route('spot.post') }}" method="post" enctype="multipart/form-data" class="flex flex-col justify-center">
                @csrf
                <div class="pt-2">
                    <label for="">Gambar</label><br>
                    <input 
                        class="border border-gray rounded-md w-full px-2 py-1 pb-2 @error('image') bg-red opacity-50 @enderror" 
                        type="file" 
                        name="image"
                    >
                    @error('image')
                        <div class="text-red mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="pt-2">
                    <label for="">Nama</label><br>
                    <input 
                        class="border border-gray rounded-md w-full px-2 py-1 pb-2" 
                        type="text" 
                        name="name" 
                        placeholder="nama tempat wisata"
                    >
                    @error('name')
                        <div class="text-red mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="pt-2">
                    <label for="">Alamat</label><br>
                    <textarea 
                        name="address" id="" 
                        class="border border-gray rounded-md w-full px-2 py-1 pb-2 h-32" 
                        placeholder="masukkan alamat" 
                        required
                    ></textarea>
                    @error('address')
                        <div class="text-red mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="pt-2">
                    <label for="">Maps</label><br>
                    <textarea 
                        name="html_address" id="" 
                        class="border border-gray rounded-md w-full px-2 py-1 pb-2 h-32" 
                        placeholder="masukkan alamat (maps)" 
                        required
                    ></textarea>
                    @error('html_address')
                        <div class="text-red mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="pt-2">
                    <label for="">Deskripsi Tempat</label><br>
                    <textarea 
                        name="description" id="" 
                        class="border border-gray rounded-md w-full px-2 py-1 pb-2 h-32" 
                        placeholder="masukkan deskripsi" 
                        required
                    ></textarea>
                    @error('description')
                        <div class="text-red mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mt-5 mb-1 ">
                    <button 
                    type="submit" class="w-full p-1 pb-1.5 rounded-md text-white-dark font-semibold bg-green-light hover:bg-green-dark">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>