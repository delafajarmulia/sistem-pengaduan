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
    <div class="flex justify-center items-center">
        <div class="flex-col w-1/2 mt-5">
            <h1 class="text-center font-bold pb-5 text-2xl">Edit Profil</h1>
            <form action="" method="post" class="px-3">
                <div class="mt-0.5">
                    <label for="" class="mb-0.5">Nama</label><br>
                    <input type="text" value="{{ $user->name }}" name="name" class="w-full px-2 pb-0.5 border border-red-500 rounded-sm">
                </div>
                <div class="mt-0.5">
                    <label for="" class="mb-0.5">NIK</label><br>
                    <input type="text" value="{{ $user->nik }}" name="nik" class="w-full px-2 pb-0.5 border border-red-500 rounded-sm">
                </div>
                <div class="mt-0.5">
                    <label for="" class="mb-0.5">Email</label><br>
                    <input type="text" value="{{ $user->email }}" name="email" class="w-full px-2 pb-0.5 border border-red-500 rounded-sm">
                </div>
                <div class="mt-0.5">
                    <label for="" class="mb-0.5">Nomor Telepon</label><br>
                    <input type="text" value="{{ $user->phone }}" name="phone" class="w-full px-2 pb-0.5 border border-red-500 rounded-sm">
                </div>
                <div class="mt-2">
                    <button type="submit" class="w-full py-1.5 bg-blue-500 text-white font-semibold rounded-md mt-2">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>