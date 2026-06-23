<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::connection('mysql')->table('users')->insert([
            [
                'name' => 'Admin Pusat',
                'email' => 'admin@mbg.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sekolah SDN 1',
                'email' => 'sekolah@mbg.com',
                'password' => Hash::make('password'),
                'role' => 'sekolah',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dapur Pusat',
                'email' => 'dapur@mbg.com',
                'password' => Hash::make('password'),
                'role' => 'dapur',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kurir 1',
                'email' => 'kurir@mbg.com',
                'password' => Hash::make('password'),
                'role' => 'kurir',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gudang Pusat',
                'email' => 'gudang@mbg.com',
                'password' => Hash::make('password'),
                'role' => 'gudang',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
