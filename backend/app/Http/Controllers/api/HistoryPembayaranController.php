<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryPembayaranController extends Controller
{
    public function historyPembayaran(Request $request)
{
    $noRumah = $request->query('nomor_rumah'); // Ambil nomor_rumah dari query string

    // Ambil bulan unik dari pembayaran
    $months = DB::table('pembayaran')
        ->selectRaw("DATE_FORMAT(tanggal_pembayaran, '%Y-%m') as bulan")
        ->distinct()
        ->orderBy('bulan', 'asc')
        ->pluck('bulan');

    // Ambil warga aktif (tanpa join riwayat_penghuni)
    $penghuniQuery = DB::table('warga')
        ->where('aktif', true)
        ->select('id', 'nama', 'nomor_rumah');

    if ($noRumah) {
        $penghuniQuery->where('nomor_rumah', $noRumah);
    }

    $penghuni = $penghuniQuery->get();

    $result = [];

    foreach ($penghuni as $p) {
        $iuranStatus = [];
        $iurans = DB::table('iuran')->where('aktif', true)->get();

        foreach ($months as $month) {
            foreach ($iurans as $iuran) {
                $isLunas = DB::table('pembayaran as p')
                    ->join('detail_pembayaran as dp', 'dp.id_pembayaran', '=', 'p.id')
                    ->where('p.id_pembayar', $p->id)
                    ->where('p.nomor_rumah', $p->nomor_rumah)
                    ->where('dp.id_iuran', $iuran->id)
                    ->whereRaw("DATE_FORMAT(p.tanggal_pembayaran, '%Y-%m') = ?", [$month])
                    ->exists();

                $iuranStatus[$iuran->nama_iuran][$month] = $isLunas ? 'lunas' : 'belum';
            }
        }

        $result[] = [
            'nama' => $p->nama,
            'nomor_rumah' => $p->nomor_rumah,
            'status_iuran' => $iuranStatus
        ];
    }

    return response()->json($result);
}


}
