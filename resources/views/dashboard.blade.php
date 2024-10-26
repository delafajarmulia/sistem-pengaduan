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
    @auth
        @if (auth()->user()->role === 'admin')
            <x-navbar-auth-admin />
        @else
            <x-navbar-auth-public />
        @endif
    @endauth
    <div class="mt-20 text-black">
        <h1 class="text-2xl font-bold pt-8 md:p-5 text-center">Semua Pengaduan</h1>
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
                            <h5 class="font-semibold text-green-light md:whitespace-nowrap">Lokasi : {{ $complaint->spot?->name }}</h5>
                            <h5 class="font-semibold text-green-light md:whitespace-nowrap">Kategori : {{ $complaint->category->name }}</h5>
                            <h5 class="font-semibold pr-2 {{ $complaint->status == 'proses' ? 'text-yellow-light' : 'text-green-light'}}">Status : {{ $complaint->status }}</h5>
                        </div>
                        <div class="flex justify-end mb-2 md:order-2 mt-2 md:mt-0 w-full md:h-fit"> <!--  flex mt-2 md:mt-0 space-x-2 justify-end md:order-2 -->
                            @auth
                                @if (auth()->user()->role === 'admin')
                                    <form action="{{ route('complaint.update', ['id'=>$complaint->id, 'user_away_id'=>$complaint->user_id])}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="px-3 pt-0.5 pb-1.5 mr-2 text-white-dark rounded-md {{ $complaint->status == 'proses' ? 'bg-green-light hover:bg-green-dark' : 'bg-yellow-light hover:bg-yellow-dark' }}">
                                            Ubah Status
                                        </button>
                                    </form>
                                    {{-- <a href="{{ route('complaint.update', ['id'=>$complaint->id, 'user_away_id'=>$complaint->user_id])}}" class="px-3 pt-0.5 pb-1.5 mr-2 text-white-dark rounded-md {{ $complaint->status == 'proses' ? 'bg-green-light hover:bg-green-dark' : 'bg-yellow-light hover:bg-yellow-dark'}}">Ubah Status</a> --}}
                                @endif
                            @endauth
                            
                            <a href="{{ route('complaint.detail', ['id'=>$complaint->id])}}" class="px-3 pt-0.5 pb-1.5 text-white-dark rounded-md bg-blue-light hover:bg-blue-dark">Lihat Detail</a>
                        </div>
                    </div>
                    
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
    </div>
</body>
</html>