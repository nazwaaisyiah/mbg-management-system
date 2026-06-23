<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengirimanSeeder extends Seeder
{
    public function run(): void
    {
        DB::connection('db_kurir')->table('pengiriman')->insert([
            [
                'kurir_id' => 1,
                'sekolah_id' => 1,
                'tanggal' => today(),
                'jumlah_porsi' => 250,
                'status' => 'diterima',
            ],
            [
                'kurir_id' => 2,
                'sekolah_id' => 2,
                'tanggal' => today(),
                'jumlah_porsi' => 300,
                'status' => 'diterima',
            ],
            [
                'kurir_id' => 3,
                'sekolah_id' => 3,
                'tanggal' => today(),
                'jumlah_porsi' => 275,
                'status' => 'perjalanan',
            ],
        ]);
    }
}
