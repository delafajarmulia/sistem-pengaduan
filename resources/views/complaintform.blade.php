<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Pengaduan</title>
    @vite('resources/css/app.css')
</head>
<body class="flex justify-center items-center">
    <div class="w-full p-5 ">
        <h1 class="text-2xl font-bold pb-5 text-center">
            Buat Pengaduan
        </h1>
        <p>
            @auth
                {{ auth()->publics()?->name }}
            @endauth
        </p>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        @endif
        <form action="{{ route('complaint.post') }}" method="post" class="p-10">
            @csrf
            <table class="w-full ">
                <tr class="" >
                    <td class="pr-3 pl-0">
                        <label for="">Kategori Pengaduan</label>
                    </td>
                    <td>
                        <select name="category" id="" class="w-full p-1 border border-red-500 rounded-sm" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr class="">
                    <td class="p-3 pl-0">
                        <label for="">Isi Pengaduan</label><br>
                    </td>
                    <td>
                        <textarea name="isi_pengaduan" id="" cols="" rows="" class="w-full h-32 mt-2 border border-red-500 rounded-sm " required></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" class="w-full p-1 mt-2 rounded-md text-white font-semibold bg-cyan-500 hover:bg-cyan-600">
                            Buat Aduan
                        </button>
                    </td>
                </tr>
            </table>
        </form>
    </div>

</body>
</html>