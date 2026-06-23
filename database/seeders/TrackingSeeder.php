<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrackingSeeder extends Seeder
{
    public function run(): void
    {
        DB::connection('db_kurir')->table('tracking')->insert([
            [
                'pengiriman_id' => 1,
                'lokasi' => 'Dapur Pusat',
                'waktu' => now()->subHours(3),
                'status' => 'Pickup',
            ],
            [
                'pengiriman_id' => 1,
                'lokasi' => 'Jalan Ahmad Yani',
                'waktu' => now()->subHours(2),
                'status' => 'Perjalanan',
            ],
            [
                'pengiriman_id' => 1,
                'lokasi' => 'SDN Negeri 1',
                'waktu' => now()->subHour(),
                'status' => 'Diterima',
            ],
        ]);
    }
}
