<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function store(Request $request)
{
    $data = $request->validate([
        'id_pembayar' => 'required|integer',
        'nomor_rumah' => 'required|string',
        'iuran' => 'required|array',
        'iuran.*.id_iuran' => 'required|integer',
        'iuran.*.jumlah' => 'required|numeric',
        'iuran.*.bulan' => 'required|array',
        'iuran.*.bulan.*' => 'required|string|date_format:Y-m',
    ]);

    foreach ($data['iuran'] as $item) {
        foreach ($item['bulan'] as $bulan) {
            // tanggal pembayaran di set ke tanggal pertama bulan
            $tanggalPembayaran = \Carbon\Carbon::createFromFormat('Y-m', $bulan)->startOfMonth();

            $pembayaranId = DB::table('pembayaran')->insertGetId([
                'id_pembayar' => $data['id_pembayar'],
                'nomor_rumah' => $data['nomor_rumah'],
                'tanggal_pembayaran' => $tanggalPembayaran,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('detail_pembayaran')->insert([
                'id_pembayaran' => $pembayaranId,
                'id_iuran' => $item['id_iuran'],
                'jumlah' => $item['jumlah'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    return response()->json(['message' => 'Pembayaran berhasil disimpan']);
}

}
