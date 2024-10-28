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
    <div class="flex justify-center items-center mt-4 md:mt-14">
        <h1>{{ $spot->name }}</h1>
    </div>
</body>
</html>