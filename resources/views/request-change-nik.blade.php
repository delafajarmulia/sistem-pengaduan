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
    <x-navbar-auth-public />
    <div class="flex justify-center items-center mt-20 mb-8 md:mb-20">
        <div class="flex-col p-5 w-11/12 mt-5 md:w-3/4 md:shadow-2xl shadow-gray px-7">
            <h1 class="text-center font-bold pb-3 pt-8 text-2xl md:pt-5">Edit Profil</h1>
            <p class="text-center">
                @auth
                    Hallo {{ auth()->user()->name }} 👋🏻...
                @endauth
            </p>
            <p class="text-center">Mau ubah NIK?</p>
            <form action="{{ route('request.change.nik.post', ['id'=>auth()->user()->id]) }}" method="post">
                @csrf
                <div class="pt-4">
                    <label for="" class="mb-0.5">NIK</label><br>
                    <input type="text" name="nik" placeholder="NIK" class="w-full px-2 py-1 pb-2 border border-gray rounded-md" required>
                    <p>
                        Pastikan NIK yang kamu masukkan sudah benar yaa
                    </p>
                    @error('nik')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="pt-4 mb-5">
                    <button type="submit" class="w-full py-1.5 pb-2 bg-green-light hover:bg-green-dark text-white-dark font-semibold rounded-md mt-2">
                        Kirim Permintaan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>