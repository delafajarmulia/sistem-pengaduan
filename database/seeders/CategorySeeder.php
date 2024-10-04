<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name'=>'Kerusakan Fasilitas',
                'description'=>'Laporan kerusakan fasilitas'
            ],
            [
                'name'=>'Pelayanan Publik',
                'description'=>'Laporan terhadap layanan publik'
            ],
            [
                'name'=>'Keamanan dan Kenyamanan',
                'description'=>'Laporan terhadap keamanan dan kenyamanan'
            ],
            [
                'name'=>'Kebersihan dan Keindahan',
                'description'=>'Laporan terhadap kebersihan dan keindahan'
            ]
            
        ]);
    }
}
