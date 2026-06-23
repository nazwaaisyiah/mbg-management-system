<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin Database
        $this->call(UserSeeder::class);
        $this->call(MonitoringSeeder::class);
        $this->call(LaporanSeeder::class);

        // Sekolah Database
        $this->call(SekolahSeeder::class);
        $this->call(PesananHarianSeeder::class);
        $this->call(KritikSaranSeeder::class);

        // Dapur Database
        $this->call(MenuSeeder::class);
        $this->call(ProduksiSeeder::class);
        $this->call(JadwalMenuSeeder::class);

        // Kurir Database
        $this->call(KurirSeeder::class);
        $this->call(PengirimanSeeder::class);
        $this->call(TrackingSeeder::class);

        // Gudang Database
        $this->call(BahanSeeder::class);
        $this->call(PembelianSeeder::class);
        $this->call(PermintaanBahanSeeder::class);
    }
}
