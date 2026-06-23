<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermintaanBahanSeeder extends Seeder
{
    public function run(): void
    {
        DB::connection('db_gudang')->table('permintaan_bahan')->insert([
            [
                'bahan_id' => 1,
                'tanggal' => today(),
                'jumlah' => 200,
                'status' => 'disetujui',
            ],
            [
                'bahan_id' => 2,
                'tanggal' => today(),
                'jumlah' => 50,
                'status' => 'pending',
            ],
        ]);
    }
}
