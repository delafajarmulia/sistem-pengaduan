<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('spots')->insert([
            [
                'name'          => 'Pantai Sigandu',
                'image'         => 'kembang-langit.jpg',
                'description'   => 'Sigandu tergolong pantai landai, dengan ombak yang tidak begitu besar. Lokasinya berjarak sekitar 4 km dari alun-alun kota Batang. 
                                    Di Pantai Sigandu tersedia fasilitas arena playground untuk anak-anak, lapangan voli, serta dihiasi dengan taman mangrove dan panorama sunset 
                                    (matahari terbenam) yang indah serta memungkinkan melihat sunrise (matahari terbit) dari garis horison.',
                'address'       => 'Dk. Kidanglor, Ds. Klidang Lor, Kec. Batang, Kabupaten Batang, Jawa Tengah 51216',
                'html_address'  => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15844.312167594868!2d109.74279334391723!3d-6.8812541898810755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e702529971fc2f5%3A0xeb3afb4a9b4fb241!2sPantai%20Sigandu%20Batang!5e0!3m2!1sid!2sid!4v1729320016845!5m2!1sid!2sid" 
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
            ],
            [
                'name'          => 'Pantai Ujungnegoro',
                'image'         => 'kembang-langit.jpg',
                'description'   => 'Terletak di Kecamatan Kandeman 12,8 km dari Ibukota Kabupaten Batang. Pantai dengan tebing di bibir pantai dan karang yang menjorok ke Laut Jawa. Mengingatkan pada tokoh penyebaran agama Islam di Kabupaten Batang, yaitu Syeikh Maulana Maghribi yang kemudian dibuat petilasan di atas tebing. 
                                    Di bawah tebing menghadap ke Laut Jawa terdapat goa peninggalan Syeikh Maulana Maghribi.',
                'address'       => 'Dk. Rowokudo, Ds. Ujungnegoro, Kec. Kandeman, Kabupaten Batang, Jawa Tengah 51261',
                'html_address'  => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9907096864426!2d109.79610637475668!3d-6.891713793107373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e703bd14981fc7f%3A0x6a8fecb1667c645f!2sPantai%20Ujungnegoro!5e0!3m2!1sid!2sid!4v1729320326907!5m2!1sid!2sid" 
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
            ],
            [
                'name'          => 'Pantai Celong',
                'image'         => 'kembang-langit.jpg',
                'description'   => 'Terletak di kecamatan Bayuputih, 32 km timur ibukota Kabupaten Batang. Pantai dengan karakteristik bebatuan karang menghampar di sepanjang pantai, memecahkan gulungan ombak Laut Jawa yang saling beriringan.',
                'address'       => 'Dk. Mangunsari, Ds. Celong, Kec. Banyuputih, Kabupaten Batang, Jawa Tengah 51271',
                'html_address'  => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.797276033672!2d109.92979597475697!3d-6.914824893084716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7040d9e756d619%3A0x1c8330d10fd26ffa!2sPantai%20Celong%20(Celong%20Beach)!5e0!3m2!1sid!2sid!4v1729320530211!5m2!1sid!2sid" 
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
            ],
            [
                'name'          => 'Desa Wisata Pandansari',
                'image'         => 'kembang-langit.jpg',
                'description'   => 'Tubing Pandansari terletak di Desa Pandansari Kecamatan Warungasem, sekitar 15 km sebelah barat ibukota Kabupaten Batang. Tubing Pandansari adalah kegiatan mengarungi arus sungai saluran irigasi persawahan di desa Pandansari. Sangat cocok untuk kegiatan refresing bersama keluarga atau teman.
                                    Selain kegiatan tubing juga menawarkan kegiatan camping dan outbound. Pengunjung juga akan diajak menikmati makanan olahan warga sekitar yaitu opak sambel.',
                'address'       => 'Ds. Pandansari, Kec. Warungasem, Kabupaten Batang, Jawa Tengah 51252',
                'html_address'  => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2217251615225!2d109.71809697475761!3d-6.983140493017742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7022f254613fb5%3A0xd0087c96f37ed405!2sDesa%20Wisata%20Pandansari!5e0!3m2!1sid!2sid!4v1729320731420!5m2!1sid!2sid" 
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
            ],
            [
                'name'          => 'Wisata Agro Selopajang Timur (WAST)',
                'image'         => 'kembang-langit.jpg',
                'description'   => 'Wisata Agro Selopajang Timur terletak di Desa Selopajang Timur Kecamatan Blado, sekitar 30 km selatan ibukota Kabupaten Batang. Objek wisata ini menawarkan taman buah yang cukup luas dilengkapi dengan kolam renang, kolam terapi ikan, aula, lapangan, wahana permainan dan outbond. 
                                    Terletak di kaki Gunung Kamulyan, objek wisata ini menawarkan kesejukan dan pemandangan yang indah.',
                'address'       => 'Jl. Raya Reban - Blado No.KM 3, Slambat, Selopajang Tim., Kec. Blado, Kabupaten Batang, Jawa Tengah 51255',
                'html_address'  => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.4981242414833!2d109.85209177475843!3d-7.068096792934522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7016a764985dfb%3A0x362633754126b0ec!2sAgro%20Wisata%20Selopajang%20Timur!5e0!3m2!1sid!2sid!4v1729320894478!5m2!1sid!2sid" 
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
            ],
            [
                'name'          => 'Taman Hiburan Rakyat Kramat',
                'image'         => 'kembang-langit.jpg',
                'description'   => 'Taman Hiburan Rakyat Kramat adalah taman kota di daerah ibukota Kabupaten Batang. THR Kramat dilengkapi dengan kolam renang prestasi dengan wahana permainan atau play ground, dan panggung hiburan yang sering diadakan pementasan dangdut maupun kesenian lainnya untuk hiburan rakyat.',
                'address'       => 'Dk. Kuncen, Ds. Proyonanggan Selatan, Kec. Batang, Kabupaten Batang, Jawa Tengah 51216',
                'html_address'  => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.718000660987!2d109.73087637475707!3d-6.924274393075475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7023b6f144ed73%3A0xdce42cf72bfd0bc4!2sTHR%20Kramat%20Batang!5e0!3m2!1sid!2sid!4v1729321103658!5m2!1sid!2sid" 
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
            ],
            [
                'name'          => 'Bandar EcoPark',
                'image'         => 'kembang-langit.jpg',
                'description'   => 'Bandar EcoPark terletak di Kecamatan Bandar, sekitar 20 km selatan Ibukota Kabupaten Batang. Objek wisata ini dirancang dengan tema taman ekowisata yang dilengkapi dengan taman bermain, kolam renang, dan aula. Taman bermain di tengah taman yang alami dengan berbagai macam wahana permainan.
                                    Kolam renang yang disusun menarik dengan mata air alami yang diambil dari sumber mata air di antara pepohonan besar di taman.',
                'address'       => 'Jl. Raya Sidomulyo No.KM 1, Karetan, Wonokerto, Kec. Bandar, Kabupaten Batang, Jawa Tengah 51254',
                'html_address'  => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.778724895155!2d109.79987717475815!3d-7.035273292966678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7017adb824f847%3A0x9607128fe4849e8c!2sKolam%20Renang%20Bandar%20EcoPark!5e0!3m2!1sid!2sid!4v1729321240869!5m2!1sid!2sid" 
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
            ],
            [
                'name'          => 'Pantai Jodo',
                'image'         => 'kembang-langit.jpg',
                'description'   => 'Terletak di Kecamatan Gringsing 45,7 km timur Ibukota Kabupaten Batang. Hamparan pasir nan luas ditumbuhi dedaunan hijau menjadikan karakter tersendiri dari pantai ini. 
                                    Di sepanjang pantai tumbuh sabuk hijau pepohonan cemara yang rindang menjadi tempat bersantai untuk menikmati keindahan pantai.',
                'address'       => 'Sikluyu, Sidorejo, Kec. Gringsing, Kabupaten Batang, Jawa Tengah 51281',
                'html_address'  => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15842.945503502087!2d109.98851284392357!3d-6.922085239240391!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7041f5e15f92d3%3A0x60be912ede79cc43!2sPantai%20Jodo!5e0!3m2!1sid!2sid!4v1729321418813!5m2!1sid!2sid" 
                                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'
            ],
        ]);
    }
}
