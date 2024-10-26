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
            ),
            new FAQ(
                'Apakah ada biaya untuk membuat pengaduan kerusakan?',
                'Tidak ada biaya. Sistem pengaduan ini gratis dan terbuka bagi seluruh masyarakat yang ingin melaporkan kerusakan fasilitas pariwisata.'
            ),
            new FAQ(
                'Berapa lama waktu yang dibutuhkan hingga pengaduan saya diproses?',
                'Setiap pengaduan biasanya diproses dalam 1-3 hari kerja, tergantung pada jumlah pengaduan yang masuk dan tingkat kerusakan yang dilaporkan.'
            ),
            new FAQ(
                'Bagaimana saya bisa mengetahui perkembangan dari pengaduan saya?',
                'Anda dapat memantau status pengaduan melalui akun di sistem pengaduan.'
            ),
            new FAQ(
                'Bagaimana jika pengaduan saya tidak ditindaklanjuti?',
                'Anda dapat menghubungi tim pengelola pengaduan atau mengirimkan pengaduan ulang jika masalah belum diatasi setelah batas waktu yang ditentukan.'
            ), 
            new FAQ(
                'Apa yang harus saya lakukan jika saya menemukan fasilitas pariwisata yang baru saja diperbaiki mengalami kerusakan lagi?',
                'Anda bisa melaporkannya kembali melalui sistem dengan menjelaskan bahwa kerusakan terjadi pada fasilitas yang baru diperbaiki. Hal ini akan menjadi prioritas agar bisa segera ditindaklanjuti.'
            ),
            new FAQ(
                'Bagaimana cara mengetahui apakah pengaduan saya sudah selesai ditindaklanjuti?',
                'Status pengaduan dapat dilihat di dashboard akun pengguna di sistem.'
            )
        ];
    }
}