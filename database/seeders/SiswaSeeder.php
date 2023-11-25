<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('siswa')->insert([
            'nama' => 'emil',
            'nomor_induk' => '1000',
            'alamat' => 'leange',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('siswa')->insert([
            'nama' => 'dani',
            'nomor_induk' => '1001',
            'alamat' => 'bowong',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('siswa')->insert([
            'nama' => 'sahid',
            'nomor_induk' => '1002',
            'alamat' => 'barue',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
