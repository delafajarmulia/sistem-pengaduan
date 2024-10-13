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
    <x-navbar-auth-public />
    {{-- <h1 class="text-underlined"> --}}
        {{-- @foreach ($complaints as $complaint)
            <p>{{$complaint->content}}</p>
            @foreach ($compaint->$responses()->get() as $response)
                <p>{{$response->content}}</p>
            @endforeach
        @endforeach --}}
    {{-- </h1> --}}
</body>
</html>