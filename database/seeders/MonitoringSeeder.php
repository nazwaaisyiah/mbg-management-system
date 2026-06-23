<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonitoringSeeder extends Seeder
{
    public function run(): void
    {
        DB::connection('mysql')->table('monitoring')->insert([
            [
                'tanggal' => today(),
                'jumlah_sekolah' => 15,
                'jumlah_pengiriman' => 45,
                'jumlah_menu' => 8,
                'jumlah_stok' => 500,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
