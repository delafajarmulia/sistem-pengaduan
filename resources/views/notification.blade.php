<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Pengaduan</title>
    @vite('resources/css/app.css')
</head>
<body class="flex justify-center items-center text-black">
    @auth
        @if (auth()->user()->role === 'admin')
            <x-navbar-auth-admin />
        @else
            <x-navbar-auth-public />
        @endif
    @endauth
    <div class="px-5 py-5 mt-24 w-full md:w-1/2 md:rounded-md md:border border-gray">
        <h1 class="text-center font-bold pb-3 text-2xl md:pb-5">Notifikasi</h1>

        <div class="mt-5">
            @forelse ($notifications as $notif)
                <a href="{{ $notif->complaint_id !== null ? route('complaint.detail', ['id'=>$notif->complaint_id]) : route('change.nik.form', ['id'=>$notif->id]) }}">
                    <div class="flex my-1.5 rounded-md border border-gray pl-2 pr-3 pt-2 pb-2.5 md:px-4 md:my-3 hover:shadow-lg shadow-gray">
                        <img 
                            src="{{ $notif->category == 'add_response' ? asset('assets/icons/chats.svg') : ( $notif->category == 'change_status' ? asset('assets/icons/seal-check.svg') : asset('assets/icons/timer.svg') ) }}" 
                            alt=""
                            class="pr-3"    
                        >
                        <div class="py-1">
                            <p>{{ $notif->message }}</p>
                            <h6 class="pt-0.5 text-xs font-semibold">{{ $notif->date_of_notification }}</h6>
                        </div>
                    </div>
                </a>
            @empty
                <p class="text-center">
                    Belum ada notifikasi untuk Anda.
                </p>
            @endforelse
        </div>
    </div>
</body>
</html>