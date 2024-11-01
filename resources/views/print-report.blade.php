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
    <p class="text-bold">Hello world!</p>

    <script>
        window.onload = function(){
            window.print();
        }

        window.onafterprint = function(){
            window.close();
        }

        window.onbeforeunload = function(){
            window.close();
        }
    </script>
</body>
</html>