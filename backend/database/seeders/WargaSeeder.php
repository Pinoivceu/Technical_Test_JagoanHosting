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
        $namaWarga = [
            'Ahmad',
            'Budi',
            'Citra',
            'Dina',
            'Eko',
            'Fani',
            'Gilang',
            'Hana',
            'Iwan',
            'Joko',
            'Kiki',
            'Lina',
            'Maman',
            'Nina',
            'Oki',
            'Putri',
            'Qori',
            'Rian',
            'Sari',
            'Tono',
        ];

        // Ambil semua nomor rumah dari database
        $nomorRumahList = DB::table('rumah')->pluck('nomor')->toArray();

        // Acak biar distribusi nomor tidak urut
        shuffle($nomorRumahList);

        $wargaList = [];

        for ($i = 0; $i < 20; $i++) {
            $wargaList[] = [
                'nama' => $namaWarga[$i],
                'jenis_kelamin' => $i % 2 == 0 ? 'laki' : 'perempuan',
                'nomor_rumah' => $nomorRumahList[$i], // Ambil dari hasil shuffle
                'status_perkawinan' => ($i + 1) % 3 == 0 ? 'lajang' : 'menikah',
                'no_telepon' => '0812345678' . str_pad($i + 1, 2, '0', STR_PAD_LEFT),
                'foto_ktp' => '0ztFIMxHZsWdAE81nATWn7GbzGTpTADQUDUb3emt.jpg',
                'aktif' => true,
                'status_hunian' => $i < 15 ? 'tetap' : 'kontrak',
            ];
        }

        DB::table('warga')->insert($wargaList);
    }
};
