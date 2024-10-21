<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistem Pengaduan</title>
        @vite('resources/css/app.css')
    </head>
    <body class="">
        <h1 class="text-3xl font-bold underline">
            Hello world!
        </h1>

        @foreach ($spots as $spot)
            <img src="{{ asset('spots/'.$spot->image) }}" alt="" style="width: 150px">
        @endforeach
    </body>
</html>
