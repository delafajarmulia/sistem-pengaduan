<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sistem Pengaduan</title>
        @vite('resources/css/app.css')
    </head>

    <body class="text-black">
        
        <div class="bg-cover bg-center h-screen flex justify-center items-center content-center" style="background-image: url('{{ asset('spots/'.$spot->image) }}')">
            
            <x-navbar-spot />

            <h1 class="text-white-dark font-bold text-3xl md:text-4xl">
                {{ $spot->name }}
            </h1>
        </div>

        <div class="mx-auto px-5 w-full md:w-3/4 my-9">
            <h1 class="text-black font-bold text-3xl mb-3">
                {{ $spot->name }}
            </h1>
            <div class="flex mx-auto flex-col md:flex-row gap-x-9 gap-y-3">
                <div>
                    <p class="text-md">
                        Alamat : {{ $spot->address }}
                    </p>
                </div>
                <div>
                    <p class="text-md">
                        {{ $spot->description }}
                    </p>
                </div>
            </div>
        </div>

        <div class="flex justify-center items-center py-5 px-3 bg-green-light w-full">
            <iframe 
                src="{{ $spot->html_address }}" 
                frameborder="0"
                class="w-full md:w-3/4 md:h-52"
            ></iframe>
        </div>
    </body>
</html>