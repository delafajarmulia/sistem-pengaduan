<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Pengaduan</title>
    @vite('resources/css/app.css')
</head>
<body class="flex justify-center items-center">
    <div class="p-10 text-black mt-5 w-96 rounded-md md:shadow-2xl shadow-gray">
        <h1 class="text-center font-bold pb-5 text-2xl">Registrasi</h1>
        
        @if ($errors->has('error'))
            <div class="flex justify-center items-center w-auto bg-red opacity-75 rounded-md mt-3">
                <p class="text-white-dark text-center py-1 px-3">
                    {{ $errors->first('error') }}    
                </p>
            </div>
        @endif

        <form id="login-form" action="{{ route('registration.post') }}" method="POST">
            @csrf
            <div class="pt-4">
                <label for="">Nama</label><br>
                <input class="border border-gray rounded-md w-full px-2 py-1 pb-2" type="name" name="name" placeholder="nama" required value="{{ old('name') }}" autocomplete="off">
                @error('name')
                    <p class="text-xs text-red">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="pt-4">
                <label for="">Email</label><br>
                <input class="border border-gray rounded-md w-full px-2 py-1 pb-2" type="email" name="email" placeholder="email" required value="{{ old('email') }}" autocomplete="off">
                @error('email')
                    <p class="text-xs text-red">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="pt-4">
                <label for="">NIK</label><br>
                <input class="border border-gray rounded-md w-full px-2 py-1 pb-2" type="number" name="nik" placeholder="nik" required value="{{ old('nik') }}" autocomplete="off">
                @error('nik')
                    <p class="text-xs text-red">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="pt-4">
                <label for="">No Telepon</label><br>
                <input class="border border-gray rounded-md w-full px-2 py-1 pb-2" type="number" name="phone" placeholder="nomor telepon" required value="{{ old('phone') }}" autocomplete="off">
                @error('phone')
                    <p class="text-xs text-red">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="pt-4">
                <label for="">Password</label><br>
                <input class="border border-gray rounded-md w-full px-2 py-1 pb-2" type="password" name="password" placeholder="password" required value="{{ old('password') }}" autocomplete="off">
                @error('password')
                    <p class="text-xs text-red">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div>
                <button type="submit" class="w-full p-1 pb-1.5 mt-5 mb-1 rounded-md text-white-dark font-semibold bg-green-light hover:bg-green-dark">Daftarkan</button>
            </div>
        </form>

    </div>
</body>
</html>