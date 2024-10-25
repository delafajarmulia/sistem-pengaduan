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
        
        @if ($errors->any())
            <div class="flex justify-center items-center w-auto bg-red opacity-75 rounded-md mt-3">
                <ul class="text-white-dark py-1 px-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('failed'))
            <div class="flex justify-center items-center w-auto bg-red opacity-75 rounded-md mt-3">
                <p class="text-white-dark text-center py-1 px-3">{{ session('failed') }}</p>
            </div>
        @endif

        <form id="login-form" action="{{ route('login.action') }}" method="POST">
            @csrf
            <div class="pt-4">
                <label for="">Email</label><br>
                <input class="border border-gray rounded-md w-full px-2 py-1 pb-2" type="email" name="email" placeholder="email" required value="{{ old('email') }}" autocomplete="off">
            </div>
            <div class="pt-4">
                <label for="">Password</label><br>
                <input class="border border-gray rounded-md w-full px-2 py-1 pb-2" type="password" name="password" placeholder="password" required value="{{ old('password') }}"> <!-- focus:border-blue-dark -->
            </div>
            <div class="mt-5 mb-1 ">
                <button type="submit" class="w-full p-1 pb-1.5 rounded-md text-white-dark font-semibold bg-green-ligth hover:bg-green-dark">Login</button>
            </div>
        </form>
    </div>
</body>
</html>