<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PembelianSeeder extends Seeder
{
    public function run(): void
    {
        DB::connection('db_gudang')->table('pembelian')->insert([
            [
                'bahan_id' => 1,
                'tanggal' => today()->subDays(5),
                'jumlah' => 300,
                'supplier' => 'PT Beras Jaya',
            ],
            [
                'bahan_id' => 2,
                'tanggal' => today()->subDays(3),
                'jumlah' => 100,
                'supplier' => 'Peternakan Mitra',
            ],
            [
                'bahan_id' => 3,
                'tanggal' => today()->subDays(2),
                'jumlah' => 500,
                'supplier' => 'Peternakan Mitra',
            ],
        ]);
    }
}
