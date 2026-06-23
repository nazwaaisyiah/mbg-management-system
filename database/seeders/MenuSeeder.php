<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    public function run(): void
    {
        DB::connection('db_dapur')->table('menu')->insert([
            [
                'nama_menu' => 'Nasi Kuning dengan Ayam',
                'kalori' => 450,
                'protein' => 25.5,
                'karbohidrat' => 55.0,
                'lemak' => 12.5,
            ],
            [
                'nama_menu' => 'Nasi Goreng Ikan',
                'kalori' => 420,
                'protein' => 22.0,
                'karbohidrat' => 60.0,
                'lemak' => 10.0,
            ],
            [
                'nama_menu' => 'Nasi Kuning dengan Telur',
                'kalori' => 380,
                'protein' => 15.5,
                'karbohidrat' => 58.0,
                'lemak' => 8.5,
            ],
            [
                'nama_menu' => 'Bubur Ayam',
                'kalori' => 350,
                'protein' => 18.0,
                'karbohidrat' => 45.0,
                'lemak' => 7.0,
            ],
            [
                'nama_menu' => 'Lontong Sayur',
                'kalori' => 320,
                'protein' => 10.0,
                'karbohidrat' => 52.0,
                'lemak' => 5.5,
            ],
        ]);
    }
}
