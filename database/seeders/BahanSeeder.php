<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BahanSeeder extends Seeder
{
    public function run(): void
    {
        DB::connection('db_gudang')->table('bahan')->insert([
            [
                'nama_bahan' => 'Beras Premium',
                'stok' => 500,
                'satuan' => 'kg',
                'minimum_stok' => 100,
            ],
            [
                'nama_bahan' => 'Ayam Segar',
                'stok' => 150,
                'satuan' => 'kg',
                'minimum_stok' => 50,
            ],
            [
                'nama_bahan' => 'Telur Ayam',
                'stok' => 200,
                'satuan' => 'butir',
                'minimum_stok' => 100,
            ],
            [
                'nama_bahan' => 'Minyak Goreng',
                'stok' => 80,
                'satuan' => 'liter',
                'minimum_stok' => 20,
            ],
            [
                'nama_bahan' => 'Garam',
                'stok' => 50,
                'satuan' => 'kg',
                'minimum_stok' => 10,
            ],
            [
                'nama_bahan' => 'Sayur Mayur',
                'stok' => 120,
                'satuan' => 'kg',
                'minimum_stok' => 30,
            ],
        ]);
    }
}
