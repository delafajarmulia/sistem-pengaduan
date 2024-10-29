<?php

use App\Helpers\commit;
use Illuminate\Support\Facades\Log;

if(!function_exists('getCommits')){
    function getCommits(){
        try{
            return [
                new commit(
                    'timer.svg',
                    'Efisien',
                    'Proses pengaduan lebih cepat, solusi lebih tepat.'
                ),
                new commit(
                    'eye.svg',
                    'Transparan',
                    'Menyediakan transparansi dalam proses perbaikan.'
                )
            ];
        }catch(\Exception $e){
            Log::error('Error fetching commits: ' . $e->getMessage());
            return []; // Mengembalikan array kosong jika terjadi error
        }
    }
}