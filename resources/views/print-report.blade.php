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
    <div class="mt-9 text-black">
        <h1 class="text-2xl font-bold md:p-5 text-center">Semua Pengaduan</h1>
        <p class="text-left pl-20 mt-5 mb-1">Dicetak pada : {{ $datetimeNow }}</p>
        <div class="flex flex-col justify-center items-center">

            @forelse ($complaints as $complaint)
                <div class="w-4/5 rounded-md border border-gray m-3 p-5 md:p-7">
                    <div class="flex flex-col md:flex-row justify-between">
                        <div class="md:order-1">
                            <h3 class="font-semibold text-lg">{{ censorName($complaint->user->name) }}</h3>
                            <h6 class="text-xs">{{ $complaint->date_of_complaint }}</h6>
                            <h5 class="font-semibold md:whitespace-nowrap">Lokasi : {{ $complaint->spot?->name }}</h5>
                            <h5 class="font-semibold md:whitespace-nowrap">Kategori : {{ $complaint->category->name }}</h5>
                            <h5 class="font-semibold pr-2 {{ $complaint->status == 'proses' ? 'text-yellow-light' : 'text-green-light'}}">Status : {{ $complaint->status }}</h5>
                        </div>
                    </div>
                    
                    @if ($complaint->image)
                        <div class="flex justify-center items-center">
                            <img 
                                src="{{ asset('complaints/'.$complaint->image) }}" 
                                alt="{{ $complaint->image }}"
                                class="w-1/2 h-1/2 my-1"
                            >
                        </div>
                    @endif
                    
                    <p>{{ $complaint->content }}</p>
                    <hr class="mt-1.5 mb-1 border border-gray">
                    @foreach ($complaint->responses()->get() as $response)
                        <div class="pl-7">
                            <h4 class="font-semibold">{{ $response->user->role === 'admin' ? $response->user->name : censorName($response->user->name) }}</h4>
                            <p>{{ $response->content }}</p>
                        </div>
                    @endforeach
                </div>
            @empty
                <p class="text-center">
                    Belum ada laporan.
                </p>
            @endforelse
        </div>

    </div>

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