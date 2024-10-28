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
    <div class="mt-20 text-black">
        <h1 class="text-2xl font-bold md:p-5 text-center">Semua Pengaduan</h1>
        <div class="flex flex-col justify-center items-center">

            @if (session('success'))
                <p class="w-3/4 p-4 mb-4 mt-5 bg-green-light opacity-75 text-white-dark font-semibold rounded-lg">
                    {{ session('success') }}
                </p>
            @endif

            @foreach ($complaints as $complaint)
                <div class="w-4/5 rounded-md border border-gray m-3 p-5 md:p-7">
                    <div class="flex flex-col md:flex-row justify-between">
                        <div class="md:order-1">
                            <h3 class="font-semibold text-lg">{{ censorName($complaint->user->name) }}</h3>
                            <h5 class="font-semibold md:whitespace-nowrap">Lokasi : {{ $complaint->spot?->name }}</h5>
                            <h5 class="font-semibold md:whitespace-nowrap">Kategori : {{ $complaint->category->name }}</h5>
                            <h5 class="font-semibold pr-2 {{ $complaint->status == 'proses' ? 'text-yellow-light' : 'text-green-light'}}">Status : {{ $complaint->status }}</h5>
                        </div>
                        <div class="flex justify-end mb-2 md:order-3 mt-2 md:mt-0 w-full md:h-fit"> <!--  flex mt-2 md:mt-0 space-x-2 justify-end md:order-2 -->
                            @auth
                                @if (auth()->user()->role === 'admin')
                                    <form action="{{ route('complaint.update', ['id'=>$complaint->id, 'user_away_id'=>$complaint->user_id])}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="px-3 pt-0.5 pb-1.5 mr-2 text-white-dark rounded-md {{ $complaint->status == 'proses' ? 'bg-green-light hover:bg-green-dark' : 'bg-yellow-light hover:bg-yellow-dark' }}">
                                            Ubah status
                                        </button>
                                    </form>
                                @endif
                            @endauth
                            
                            <a href="{{ route('complaint.detail', ['id'=>$complaint->id])}}" class="px-3 pt-0.5 pb-1.5 text-white-dark rounded-md bg-blue-light hover:bg-blue-dark">
                                Lihat detail
                            </a>
                        </div>
                    </div>
                    
                    @if ($complaint->image)
                        <div class="flex justify-center items-center">
                            <img 
                                src="{{ asset('complaints/'.$complaint->image) }}" 
                                alt="{{ $complaint->image }}"
                                class="mx-1"
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
            @endforeach
        </div>

        <!-- Floating Action Button -->
        <div class="fixed bottom-6 right-6">
            <a 
                href="{{ route('notifications', ['id'=>auth()->user()->id]) }}" 
                class="relative bg-green-light hover:bg-green-dark text-white-dark font-bold pt-3 pb-4 px-5 rounded-full shadow-lg shadow-gray transition transform hover:scale-125"
                >
                <!-- Icon Notifikasi -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 inline-block">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 22c1.104 0 2-.896 2-2H10c0 1.104.896 2 2 2zm6-6V10c0-3.313-1.791-6.158-4.5-7.295A3.001 3.001 0 0012 2a3.001 3.001 0 00-1.5.705C8.791 3.842 7 6.687 7 10v6l-1 1v1h12v-1l-1-1z" />
                </svg>
                <span class="sr-only">
                    Add Notification
                </span>
                <!-- Indikator Notifikasi -->
                <span class="absolute top-0 right-0 inline-flex items-center justify-center w-5 h-5 bg-red text-white-strong text-xs font-bold rounded-full -mr-1 -mt-1">
                    {{ $notificationCount }}
                </span>
            </a>
        </div>

    </div>
</body>
</html>