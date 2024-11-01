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
    <x-navbar-auth />
    <div class="p-10 text-black mt-14 w-96 rounded-md md:shadow-2xl shadow-gray">
        <h1 class="text-center font-bold pb-5 text-2xl">Tambah Pengguna</h1>
        
        @if ($errors->has('error'))
            <div class="flex justify-center items-center w-auto bg-red opacity-75 rounded-md mt-3">
                <p class="text-white-dark text-center py-1 px-3">
                    {{ $errors->first('error') }}    
                </p>
            </div>
        @endif

        <form id="login-form" action="{{ route('user.add.post') }}" method="POST">
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
                <label for="">Posisi</label>
                <select name="role" id="" class="border border-gray rounded-md w-full px-2 py-1 pb-2">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
                @error('role')
                    <p class="text-xs text-red">
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="pt-4">
                <label for="">Password</label><br>
                <input class="border border-gray rounded-md w-full px-2 py-1 pb-2" type="password" id="password" name="password" placeholder="password" required value="{{ old('password') }}" autocomplete="off">
                <div class="flex flex-cols mt-0.5">
                    <input type="checkbox" onclick="showPw()"> 
                    <p class="text-sm pl-1">lihat kata sandi</p>                  
                </div>
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