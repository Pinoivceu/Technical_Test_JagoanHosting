<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IuranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('iuran')->insert([
            [
                'nama_iuran' => 'Iuran Kebersihan',
                'frekuensi' => 'bulanan',
                'jumlah' => 25000,
                'aktif' => true,
            ],
            [
                'nama_iuran' => 'Iuran Satpam',
                'frekuensi' => 'bulanan',
                'jumlah' => 50000,
                'aktif' => true,
            ],
        ]);
    }
}
