<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $wargaList = [];

        for ($i = 1; $i <= 20; $i++) {
            $wargaList[] = [
                'nama' => 'Warga ' . $i,
                'jenis_kelamin' => $i % 2 == 0 ? 'perempuan' : 'laki',
                'nomor_rumah' => $i,
                'status_perkawinan' => $i % 3 == 0 ? 'lajang' : 'menikah',
                'no_telepon' => '0812345678' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'foto_ktp' => '0ztFIMxHZsWdAE81nATWn7GbzGTpTADQUDUb3emt.jpg',
                'aktif' => true,
                'status_hunian' => $i <= 15 ? 'tetap' : 'kontrak',
            ];
        }

        DB::table('warga')->insert($wargaList);
    }
}
