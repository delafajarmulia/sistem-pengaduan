<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('responses')->insert([
            [
                'complaint_id'          =>'3',
                'user_id'               =>'1',
                'content'               =>'Terima kasih atas laporan Anda. Saat ini kami telah mengerahkan personil dari Polres Batang untuk menindaklanjuti masalah ini',
                'date_of_response'      =>Carbon::now()->setTimeZone('Asia/Jakarta')->format('Y-m-d H:i:s'),
            ],
            [
                'complaint_id'          =>'5',
                'user_id'               =>'1',
                'content'               =>'Terima kasih atas laporan Anda. Saat ini kami telah mengerahkan personil dari Polres Batang untuk menindaklanjuti masalah ini',
                'date_of_response'      =>Carbon::now()->setTimeZone('Asia/Jakarta')->format('Y-m-d H:i:s'),
            ],
            [
                'complaint_id'          =>'2',
                'user_id'               =>'1',
                'content'               =>'Terima kasih atas laporan Anda. Kami akan segera memberikan edukasi lebih lanjut terhadap petugas wisata khususnya untuk wisata Kebuh Teh Pagilaran',
                'date_of_response'      =>Carbon::now()->setTimeZone('Asia/Jakarta')->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
