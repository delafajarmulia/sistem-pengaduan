<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Pengaduan</title>
    @vite('resources/css/app.css')
</head>
<body class="flex justify-center items-center text-black">
    <x-navbar-auth />
    <div class="px-5 py-5 my-14 md:mt-24 w-full md:w-1/2 md:rounded-md md:border border-gray">
        <h1 class="text-center font-bold pb-3 text-2xl md:pb-5">Daftar Pengguna</h1>
        <p class="text-right">Total pengguna : {{ $userSum }}</p>

        <div class="mt-5">
            @foreach ($users as $user)
                <div class="flex flex-row justify-between my-1.5 rounded-md border border-gray pl-2 pr-3 pt-2 pb-2.5 md:px-4 md:my-3 hover:shadow-lg shadow-gray">
                    <div>
                        <h3 class="font-semibold text-lg">
                            {{ $user->name }}
                        </h3>
                        <h6>
                            {{ $user->email }}
                        </h6>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>