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
    <div class="mt-20 flex flex-col justify-center items-center">
        <div class="w-4/5 rounded-md border border-red-500 m-3 p-5">
            <div class="flex justify-between">
                <div>
                    <h3 class="font-semibold">{{ censorName($complaint->user->name) }}</h3>
                    <h5 class="text-xs">{{ $complaint->date_of_complaint }}</h5>
                    <div class="flex flex-row">
                        <h5 class="font-semibold pr-2 {{ $complaint->status == 'proses' ? 'text-yellow-300' : 'text-green-500'}}">{{ $complaint->status }}</h5>
                        <h5 class="pr-2">|</h5>
                        <h5 class="font-semibold text-green-500">{{ $complaint->category->name }}</h5>
                    </div>
                </div>
                <div>
                    @auth
                        @if (auth()->user()->role === 'admin')
                            <a href="{{ route('complaint.update', ['id'=>$complaint->id])}}" class="px-3 pt-0.5 pb-1.5 text-white rounded-md {{ $complaint->status == 'proses' ? 'bg-green-500' : 'bg-yellow-300'}}">Ubah Status</a>
                        @endif
                    @endauth
                    
                    <a href="{{ route('dashboard')}}" class="px-3 pt-0.5 pb-1.5 text-white rounded-md bg-blue-500 hover:bg-blue-600">Kembali</a>
                </div>
            </div>
            <p>{{ $complaint->content }}</p>
            <hr class="mt-1.5 mb-1 border border-gray-300">
            @foreach ($complaint->responses()->get() as $response)
                <div class="pl-7">
                    <h3 class="font-semibold">{{ $response->user->role === 'admin' ? $response->user->name : censorName($response->user->name) }}</h3>
                    <h5 class="text-xs">{{ $response->date_of_response }}</h5>
                    <p>{{ $response->content }}</p>
                </div>
            @endforeach
            <form action="{{ route('response.add', ['id'=>$complaint->id])}}" method="post" class="mt-5">
                @csrf
                <label for="">Tambahkan tanggapan Anda</label><br>
                <textarea name="response" class="w-full border border-red-500 rounded-md mt-1 p-2"></textarea>
                <button type="submit" class="w-full py-1.5 bg-blue-500 text-white font-semibold rounded-md mt-2">
                    Tambahkan
                </button>
            </form>
        </div>
    </div>
</body>
</html>