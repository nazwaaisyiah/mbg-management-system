<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KurirSeeder extends Seeder
{
    public function run(): void
    {
        DB::connection('db_kurir')->table('kurir')->insert([
            [
                'nama_kurir' => 'Budi Hermawan',
                'telepon' => '081234567890',
                'kendaraan' => 'Motor Besar',
            ],
            [
                'nama_kurir' => 'Ade Kusuma',
                'telepon' => '081298765432',
                'kendaraan' => 'Motor Besar',
            ],
            [
                'nama_kurir' => 'Roni Saputra',
                'telepon' => '082123456789',
                'kendaraan' => 'Mobil Box',
            ],
        ]);
    }
}
