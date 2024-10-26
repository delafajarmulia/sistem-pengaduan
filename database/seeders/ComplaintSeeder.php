<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComplaintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('complaints')->insert([
            [
                'category_id'           =>'1',
                'user_id'               =>'2',
                'content'               =>'Banyak sekali fasilitas umum di pantai ujungngeoro yang mengalami kerusakan',
                'status'                =>'proses',
                'date_of_complaint'     =>Carbon::now()->setTimeZone('Asia/Jakarta')->format('Y-m-d H:i:s'),
            ],
            [
                'category_id'           =>'2',
                'user_id'               =>'4',
                'content'               =>'Informasi yang disampaikan oleh petugas di wisata kebun teh Pagilaran tidak disampaikan secara profesional',
                'status'                =>'proses',
                'date_of_complaint'     =>Carbon::now()->setTimeZone('Asia/Jakarta')->format('Y-m-d H:i:s'),
            ],
            [
                'category_id'           =>'3',
                'user_id'               =>'2',
                'content'               =>'Sering terjadi tawuran disepanjang jalan di pantai Ujungnegoro ketika malam',
                'status'                =>'selesai',
                'date_of_complaint'     =>Carbon::now()->setTimeZone('Asia/Jakarta')->format('Y-m-d H:i:s'),
            ],
            [
                'category_id'           =>'4',
                'user_id'               =>'5',
                'content'               =>'Banyak sampah yang dibuang sembarangan di pantai Adinuso, Subah',
                'status'                =>'proses',
                'date_of_complaint'     =>Carbon::now()->setTimeZone('Asia/Jakarta')->format('Y-m-d H:i:s'),
            ],
            [
                'category_id'           =>'4',
                'user_id'               =>'3',
                'content'               =>'Banyak coretan yang tidak pantas disekitar alun-alun kota Batang',
                'status'                =>'proses',
                'date_of_complaint'     =>Carbon::now()->setTimeZone('Asia/Jakarta')->format('Y-m-d H:i:s'),
            ],
        ]);
    }
}
