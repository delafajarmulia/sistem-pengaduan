<?php

use App\Helpers\commit;

if(!function_exists('getCommits')){
    function getCommits(){
        return [
            new commit(
                'timer.svg',
                'Cepat dan Tepat',
                'Menjamin respons cepat terhadap laporan.'
            ),
            new commit(
                'eye.svg',
                'Transparan',
                'Menyediakan transparansi dalam proses perbaikan.'
            ),
            new commit(
                'chats.svg',
                'Partisipatif',
                'Mengajak masyarakat untuk terlibat aktif dalam menjaga fasilitas pariwisata.'
            ),
            new commit(
                'seal-check.svg',
                'Aman dan Terpercaya',
                'Menyediakan sistem yang aman dan dapat diandalkan untuk melaporkan kerusakan dengan kerahasiaan terjaga.'
            ),
        ];
    }
}