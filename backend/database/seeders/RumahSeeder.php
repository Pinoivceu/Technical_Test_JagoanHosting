<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rumah;

class RumahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $usedNumbers = [
            3,
            7,
            12,
            18,
            22,
            27,
            31,
            35,
            40,
            44,
            48,
            53,
            59,
            62,
            68,
            72,
            77,
            81,
            90,
            95,
        ];

        for ($i = 0; $i < 20; $i++) {
            do {
                $nomor = rand(1, 100); // kamu bisa ubah range sesuai kebutuhan
            } while (in_array($nomor, $usedNumbers));

            $usedNumbers[] = $nomor;

            Rumah::create([
                'nomor' => $nomor,
            ]);
        }
    }
}
