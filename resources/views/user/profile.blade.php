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
    <div class="mt-4 md:mt-14 mb-8 text-black flex justify-center items-center md:mb-20">
        <div class="flex-col p-5 w-11/12 mt-5 md:w-3/4 md:shadow-2xl shadow-gray px-7">
            <h1 class="text-center font-bold pb-3 pt-8 text-2xl md:pt-5">Edit Profil</h1>
            <p class="text-center">
                @auth
                    Hallo {{ auth()->user()->name }} 👋🏻...
                @endauth
            </p>
            <p class="text-center">Ada data yang ingin kamu ubah?</p>
            @if (session('success'))
                <p>{{ session('success') }}</p>
            @endif
            <form action="{{ route('profile.update', ['id'=>$user->id])}}" method="post" class="px-3 py-2">
                @csrf
                @method('PUT')
                <div class="pt-4">
                    <label for="" class="mb-0.5">Nama</label><br>
                    <input type="text" value="{{ $user->name }}" name="name" class="w-full px-2 py-1 pb-2 border border-gray rounded-md" required>
                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="pt-4">
                    <label for="" class="mb-0.5">NIK</label><br>
                    <input type="text" value="{{ $user->nik }}" name="nik" class="w-full px-2 py-1 pb-2 border border-gray rounded-md" readonly>
                    @error('nik')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="pt-4">
                    <label for="" class="mb-0.5">Email</label><br>
                    <input type="text" value="{{ $user->email }}" name="email" class="w-full px-2 py-1 pb-2 border border-gray rounded-md" required>
                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="pt-4">
                    <label for="" class="mb-0.5">Nomor Telepon</label><br>
                    <input type="text" value="{{ $user->phone }}" name="phone" class="w-full px-2 py-1 pb-2 border border-gray rounded-md" required>
                    @error('phone')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="pt-4">
                    <label for="" class="mb-0.5">Password</label><br>
                    <input type="text" name="password" class="w-full px-2 py-1 pb-2 border border-gray rounded-md">
                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="pt-4">
                    <label for="" class="mb-0.5">Ulangi Password (konfimasi)</label><br>
                    <input type="text" name="confirm_password" class="w-full px-2 py-1 pb-2 border border-gray rounded-md">
                    @error('confirm_password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="pt-4">
                    <p class="pb-1">
                        *Jika terjadi kesalahan pada NIK, maka kami menyarankan Anda untuk melaporkan pada petugas Sistem Pengaduan, dengan cara 
                        <a href="{{ route('request.change.nik', ['id'=>$user->id]) }}" class="underline text-blue-dark hover:text-blue-light">klik disini</a>.
                    </p>
                    <p>
                        **Untuk melindungi privasi dan keamanan Anda, kami menyimpan password Anda dalam bentuk terenkripsi (hash). Artinya, tidak ada yang bisa melihat atau mengakses password Anda, 
                        termasuk kami. Jika Anda lupa password, Anda dapat mengatur ulang (reset) atau menggantinya kapan saja dengan mengisikan inputan ubah password.
                    </p>
                </div>
                <div class="pt-4 mb-5">
                    <button type="submit" class="w-full py-1.5 pb-2 bg-green-light hover:bg-green-dark text-white-dark font-semibold rounded-md mt-2">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>