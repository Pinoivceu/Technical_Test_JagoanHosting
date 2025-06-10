<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $wargas = DB::table('warga')
            ->select('id', 'nomor_rumah')
            ->where('aktif', true)
            ->get();

        $iurans = DB::table('iuran')->where('aktif', true)->get();

        foreach ($wargas as $warga) {
            // Simulasikan pembayaran selama 12 bulan terakhir
            for ($i = 0; $i < 12; $i++) {
                $tanggalPembayaran = Carbon::now()->subMonths($i)->startOfMonth()->addDays(rand(1, 5));

                $pembayaranId = DB::table('pembayaran')->insertGetId([
                    'id_pembayar' => $warga->id,
                    'nomor_rumah' => $warga->nomor_rumah,
                    'tanggal_pembayaran' => $tanggalPembayaran,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

                foreach ($iurans as $iuran) {
                    DB::table('detail_pembayaran')->insert([
                        'id_pembayaran' => $pembayaranId,
                        'id_iuran' => $iuran->id,
                        'jumlah' => $iuran->jumlah,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            }
        }
    }
}
