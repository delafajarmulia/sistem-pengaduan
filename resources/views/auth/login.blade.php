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
        <h1 class="text-center font-bold pb-5 text-2xl">Login</h1>
        
        @if (session('success'))
            <p class="w-full p-4 mb-4 mt-5 bg-green-light opacity-75 text-white-dark font-semibold rounded-lg">
                {{ session('success') }}
            </p>
        @endif

        @if ($errors->has('error'))
            <p class="w-full p-4 mb-4 mt-5 bg-redt opacity-75 text-white-dark font-semibold rounded-lg">
                {{ $errors->first('error') }}
            </p>
        @endif

        <form id="login-form" action="{{ route('login.action') }}" method="POST">
            @csrf
            <div class="pt-4">
                <label for="">Email</label><br>
                <input class="border border-gray rounded-md w-full px-2 py-1 pb-2" type="email" name="email" placeholder="Masukkan email" required value="{{ old('email') }}" autocomplete="off">
                @error('email')
                    <p class="text-xs text-red">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="pt-4">
                <label for="">Kata sandi</label><br>
                <input class="border border-gray rounded-md w-full px-2 py-1 pb-2" type="password" id="password" name="password" placeholder="Masukkan kata sandi" required value="{{ old('password') }}"> <!-- focus:border-blue-dark -->
                <div class="flex flex-cols mt-0.5">
                    <input type="checkbox" onclick="showPw()"> 
                    <p class="text-sm pl-1">lihat kata sandi</p>                  
                </div>
                @error('password')
                    <p class="text-xs text-red">
                        {{ $message }}
                    </p>
                @enderror
                {{-- <p class="text-right text-xs">
                    <a href="" class="text-blue-dark hover:text-blue-light">Lupa kata sandi?</a>
                </p> --}}
            </div>
            <div class="mt-5 mb-1 ">
                <button type="submit" class="w-full p-1 pb-1.5 rounded-md text-white-dark font-semibold bg-green-light hover:bg-green-dark">Login</button>
            </div>
            <div>
                <p class="mb-3 text-xs text-center">
                    Belum punya akun? <a href="{{ route('registration') }}" class="text-blue-dark hover:text-blue-light">Daftar Sekarang</a>
                </p>
            </div>
        </form>
    </div>

    <script>
        function showPw(){
            let inputPw = document.getElementById('password');

            if(inputPw.type === 'password'){
                inputPw.type = 'text';
            }else{
                inputPw.type = 'password';
            }
        }
    </script>
</body>
</html>