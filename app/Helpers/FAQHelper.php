<?php

// namespace App\Helpers;

use App\Helpers\FAQ;

if(!function_exists('getFAQs')){
    function getFAQs(){
        return [
            new FAQ(
                'Apa saja jenis fasilitas yang dapat dilaporkan kerusakannya?',
                'Semua fasilitas umum di area pariwisata Kabupaten Batang dapat dilaporkan, seperti toilet, tempat duduk, jalan setapak, penerangan, dan fasilitas lainnya.'
            ),
            new FAQ(
                'Bagaimana cara membuat pengaduan kerusakan fasilitas?',
                'Anda bisa membuat pengaduan dengan mengisi formulir online di website pengaduan. Isi semua informasi yang diminta, termasuk detail kerusakan, lokasi, dan foto jika memungkinkan.'
            )
        ];
    }
}

if (!function_exists('testFunction')) {
    function testFunction() {
        return 'Hello World';
    }
}
