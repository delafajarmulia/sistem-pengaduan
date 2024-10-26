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
    <h1>ini notif</h1>
    @foreach ($notifications as $notif)
        <p>{{ $notif->message }}</p>
    @endforeach
</body>
</html>