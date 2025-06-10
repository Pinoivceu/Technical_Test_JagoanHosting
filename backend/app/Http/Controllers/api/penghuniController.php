<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RiwayatPenghuni;
use App\Models\Warga;
use Illuminate\Support\Facades\DB;

class penghuniController extends Controller
{
    public function updatePenghuni(Request $request, $nomorRumah)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'jenis_kelamin' => 'required|in:laki,perempuan',
            'status_perkawinan' => 'required|in:menikah,lajang,bercerai',
            'no_telepon' => 'required|string',
            'foto_ktp' => 'required|string',
            'status_hunian' => 'required|in:kontrak,tetap',
        ]);

        DB::beginTransaction();
        try {
            // Nonaktifkan penghuni sebelumnya
            $existing = Warga::where('no_rumah', $nomorRumah)->where('aktif', true)->first();
            if ($existing) {
                $existing->update(['aktif' => false]);

                // Update tanggal_keluar di riwayat
                RiwayatPenghuni::where('id_warga', $existing->id)
                    ->whereNull('tanggal_keluar')
                    ->update(['tanggal_keluar' => now()]);
            }

            // Tambahkan penghuni baru
            $wargaBaru = Warga::create([
                'nama' => $validated['nama'],
                'jenis_kelamin' => $validated['jenis_kelamin'],
                'status_perkawinan' => $validated['status_perkawinan'],
                'no_telepon' => $validated['no_telepon'],
                'foto_ktp' => $validated['foto_ktp'],
                'status_hunian' => $validated['status_hunian'],
                'no_rumah' => $nomorRumah,
                'aktif' => true,
            ]);

            RiwayatPenghuni::create([
                'id_warga' => $wargaBaru->id,
                'nomor_rumah' => $nomorRumah,
                'tanggal_masuk' => now(),
            ]);

            DB::commit();
            return response()->json(['message' => 'Penghuni berhasil ditambahkan/diubah']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getAktif()
    {
        $penghuni = Warga::where('aktif', true)
            ->join('riwayat_penghuni', 'warga.id', '=', 'riwayat_penghuni.id_warga')
            ->join('rumah', 'riwayat_penghuni.nomor_rumah', '=', 'rumah.nomor')
            ->whereNull('riwayat_penghuni.tanggal_keluar')
            ->select('warga.id', 'warga.nama', 'rumah.nomor as no_rumah')
            ->get();

        return response()->json($penghuni);
    }
}
