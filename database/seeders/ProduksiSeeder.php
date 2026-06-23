<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProduksiSeeder extends Seeder
{
    public function run(): void
    {
        DB::connection('db_dapur')->table('produksi')->insert([
            [
                'menu_id' => 1,
                'tanggal' => today(),
                'jumlah_porsi' => 825,
                'status' => 'selesai',
            ],
            [
                'menu_id' => 2,
                'tanggal' => today()->addDay(),
                'jumlah_porsi' => 750,
                'status' => 'perencanaan',
            ],
        ]);
    }
}
