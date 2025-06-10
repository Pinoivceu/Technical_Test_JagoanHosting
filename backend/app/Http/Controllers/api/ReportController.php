<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    public function summary(Request $request)
    {

        $year = $request->year ?? now()->year;

        // Ambil total pemasukan (dari detail_pembayaran)
        $pemasukan = DB::table('pembayaran')
            ->join('detail_pembayaran', 'pembayaran.id', '=', 'detail_pembayaran.id_pembayaran')
            ->selectRaw('DATE(pembayaran.tanggal_pembayaran) as date, SUM(detail_pembayaran.jumlah) as total')
            ->whereYear('pembayaran.tanggal_pembayaran', $year)
            ->groupBy(DB::raw('DATE(pembayaran.tanggal_pembayaran)'))
            ->pluck('total', 'date');

        // Ambil total pengeluaran
        $pengeluaran = DB::table('pengeluaran')
            ->selectRaw('DATE(tanggal) as date, SUM(jumlah) as total')
            ->whereYear('tanggal', $year)
            ->groupBy(DB::raw('DATE(tanggal)'))
            ->pluck('total', 'date');

        // Gabungkan jadi satu data format untuk grafik
        $dates = collect($pemasukan->keys())
            ->merge($pengeluaran->keys())
            ->unique()
            ->sort()
            ->values();

        $result = $dates->map(function ($date) use ($pemasukan, $pengeluaran) {
            return [
                'date' => $date,
                'pemasukkan' => (int)($pemasukan[$date] ?? 0),
                'pengeluaran' => (int)($pengeluaran[$date] ?? 0),
            ];
        });

        return response()->json($result);
    }

    public function detail(Request $request)
    {
        $bulan = $request->query('bulan'); // format: YYYY-MM
        if (!$bulan) return response()->json(['error' => 'Parameter bulan diperlukan'], 400);

        $pemasukan = DB::table('pembayaran')
            ->join('detail_pembayaran', 'pembayaran.id', '=', 'detail_pembayaran.id_pembayaran')
            ->join('iuran', 'detail_pembayaran.id_iuran', '=', 'iuran.id')
            ->join('warga', 'pembayaran.id_pembayar', '=', 'warga.id')
            ->select('tanggal_pembayaran as tanggal', 'nama_iuran as deskripsi', DB::raw("'pemasukan' as tipe"), 'jumlah')
            ->whereRaw("DATE_FORMAT(tanggal_pembayaran, '%Y-%m') = ?", [$bulan]);

        $pengeluaran = DB::table('pengeluaran')
            ->select('tanggal', 'kategori as deskripsi', DB::raw("'pengeluaran' as tipe"), 'jumlah')
            ->whereRaw("DATE_FORMAT(tanggal, '%Y-%m') = ?", [$bulan]);

        // gabung dan sort
        $data = $pemasukan->unionAll($pengeluaran)->get()->sortBy('tanggal')->values();

        return response()->json($data);
    }
}
