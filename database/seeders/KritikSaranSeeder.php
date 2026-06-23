<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KritikSaranSeeder extends Seeder
{
    public function run(): void
    {
        DB::connection('db_sekolah')->table('kritik_saran')->insert([
            [
                'sekolah_id' => 1,
                'pesan' => 'Makanan sangat lezat dan bergizi, terima kasih atas program ini.',
                'tanggal' => today(),
            ],
            [
                'sekolah_id' => 2,
                'pesan' => 'Tolong tambahkan variasi menu untuk kesegaran.',
                'tanggal' => today(),
            ],
        ]);
    }
}
