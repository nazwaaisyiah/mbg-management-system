<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PesananHarianSeeder extends Seeder
{
    public function run(): void
    {
        DB::connection('db_sekolah')->table('pesanan_harian')->insert([
            [
                'sekolah_id' => 1,
                'tanggal' => today(),
                'jumlah_porsi' => 250,
                'status' => 'disetujui',
            ],
            [
                'sekolah_id' => 2,
                'tanggal' => today(),
                'jumlah_porsi' => 300,
                'status' => 'disetujui',
            ],
            [
                'sekolah_id' => 3,
                'tanggal' => today(),
                'jumlah_porsi' => 275,
                'status' => 'pending',
            ],
        ]);
    }
}
