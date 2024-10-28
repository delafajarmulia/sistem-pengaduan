<?php

use App\Helpers\commit;

if(!function_exists('getCommits')){
    function getCommits(){
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
    }
}