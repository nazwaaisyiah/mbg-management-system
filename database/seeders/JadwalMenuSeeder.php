<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalMenuSeeder extends Seeder
{
    public function run(): void
    {
        DB::connection('db_dapur')->table('jadwal_menu')->insert([
            ['menu_id' => 1, 'tanggal_saji' => today()],
            ['menu_id' => 2, 'tanggal_saji' => today()->addDay()],
            ['menu_id' => 3, 'tanggal_saji' => today()->addDays(2)],
            ['menu_id' => 4, 'tanggal_saji' => today()->addDays(3)],
            ['menu_id' => 5, 'tanggal_saji' => today()->addDays(4)],
        ]);
    }
}
