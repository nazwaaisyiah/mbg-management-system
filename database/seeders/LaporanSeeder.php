<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaporanSeeder extends Seeder
{
    public function run(): void
    {
        DB::connection('mysql')->table('laporan')->insert([
            [
                'judul' => 'Laporan Program MBG Bulan Juni',
                'isi_laporan' => 'Program Makan Bergizi Gratis berjalan dengan baik selama bulan Juni. Terdapat 15 sekolah yang terlibat dengan total 450 porsi makanan bergizi yang didistribusikan.',
                'tanggal' => today(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
