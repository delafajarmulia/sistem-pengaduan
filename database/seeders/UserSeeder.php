<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name'=>'Pipit Sofi Adila',
                'nik'=>'3325134204030001',
                'email'=>'pipit@gmail.com',
                'phone'=>'089257819746',
                'password'=>bcrypt('pipit12345')
            ],
            [
                'name'=>'Fitri Yuliani',
                'nik'=>'3325134207010001',
                'email'=>'yuli@gmail.com',
                'phone'=>'089267819746',
                'password'=>bcrypt('yuli12345')
            ],
            [
                'name'=>'Wulan Setiyani',
                'nik'=>'3325134210990001',
                'email'=>'wulan@gmail.com',
                'phone'=>'089557819746',
                'password'=>bcrypt('wulan12345')
            ]
        ]);
    }
}
