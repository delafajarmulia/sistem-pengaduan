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
    <div class="mt-14 flex flex-col justify-center items-center text-black">
        <div class="w-full md:w-3/4 m-3 p-5 text-black rounded-md md:shadow-2xl shadow-gray md:px-7">
            <h1 class="text-center pb-7 md:pb-5 text-2xl font-bold md:pt-4">Detail Pengaduan</h1>
            <div class="flex flex-col md:flex-row justify-between">
                <div>
                    <h3 class="font-semibold text-lg">{{ censorName($complaint->user->name) }}</h3>
                    <h5 class="text-xs">{{ $complaint->date_of_complaint }}</h5>
                    <h5 class="font-semibold text-md pt-2">{{ $complaint->spot?->name }}</h5>
                    <div class="flex flex-row pb-2">
                        <h5 class="font-semibold pr-2 {{ $complaint->status == 'proses' ? 'text-yellow-light' : 'text-green-light'}}">{{ $complaint->status }}</h5>
                        <h5 class="pr-2">|</h5>
                        <h5 class="font-semibold whitespace-nowrap">{{ $complaint->category->name }}</h5>
                    </div>
                </div>
                <div class="mb-3 flex h-fit">
                    @auth
                        @if (auth()->user()->role === 'admin')
                            <form action="{{ route('complaint.update', ['id'=>$complaint->id, 'user_away_id'=>$complaint->user_id])}}" method="post">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="px-3 pt-0.5 pb-1.5 mr-2 text-white-dark rounded-md {{ $complaint->status == 'proses' ? 'bg-green-light hover:bg-green-dark' : 'bg-yellow-light hover:bg-yellow-dark' }}">
                                    Ubah Status
                                </button>
                            </form>
                        @endif
                    @endauth
                    
                    <a href="{{ route('dashboard')}}" class="px-3 pt-0.5 pb-1.5 text-white-dark rounded-md bg-blue-light hover:bg-blue-dark">Kembali</a>
                </div>
            </div>

            @if ($complaint->image)
                <div class="flex justify-center items-center">
                    <img 
                        src="{{ asset('complaints/'.$complaint->image) }}" 
                        alt="{{ $complaint->image }}"
                        class="w-auto h-auto md:w-1/2 md:h-1/2 my-1"
                    >
                </div>
            @endif

            <p>{{ $complaint->content }}</p>
            <hr class="mt-1.5 mb-1 border border-gray">
            @foreach ($complaint->responses()->get() as $response)
                <div class="pl-7">
                    <h3 class="font-semibold text-lg">{{ $response->user->role === 'admin' ? $response->user->name : censorName($response->user->name) }}</h3>
                    <h5 class="text-xs pb-2">{{ $response->date_of_response }}</h5>
                    <p>{{ $response->content }}</p>
                </div>
            @endforeach
            <form action="{{ route('response.post', ['id'=>$complaint->id])}}" method="post" class="mt-5">
                @csrf
                <label for="">Tambahkan tanggapan Anda</label><br>
                <textarea name="response" class="w-full border border-gray rounded-md mt-1 p-2 pb-3"></textarea>
                @error('response')
                    <p class="text-xs text-red">
                        {{ $message }}
                    </p>
                @enderror
                <button type="submit" class="w-full py-1.5 pb-2 bg-green-light hover:bg-green-dark text-white-dark font-semibold rounded-md mt-3 mb-5">
                    Tambahkan
                </button>
            </form>
        </div>
    </div>
</body>
</html>