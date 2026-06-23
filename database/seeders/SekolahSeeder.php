<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SekolahSeeder extends Seeder
{
    public function run(): void
    {
        DB::connection('db_sekolah')->table('sekolah')->insert([
            [
                'nama_sekolah' => 'SDN Negeri 1',
                'alamat' => 'Jl. Merdeka No. 1, Jakarta',
                'kepala_sekolah' => 'Budi Santoso',
                'jumlah_siswa' => 250,
            ],
            [
                'nama_sekolah' => 'SDN Negeri 2',
                'alamat' => 'Jl. Ahmad Yani No. 5, Jakarta',
                'kepala_sekolah' => 'Siti Nurhaliza',
                'jumlah_siswa' => 300,
            ],
            [
                'nama_sekolah' => 'SDN Negeri 3',
                'alamat' => 'Jl. Gatot Subroto No. 10, Jakarta',
                'kepala_sekolah' => 'Ahmad Wijaya',
                'jumlah_siswa' => 275,
            ],
        ]);
    }
}
