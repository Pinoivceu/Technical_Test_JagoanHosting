<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RiwayatPenghuni;
use Dotenv\Parser\Entry;

class RiwayatPenghuniController extends Controller
{
    public function index()
    {
        $riwayat = RiwayatPenghuni::with(['warga', 'rumah'])->get();
        return response()->json($riwayat);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_warga' => 'required|exists:warga,id',
            'nomor_rumah' => 'required|exists:rumah,nomor',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'nullable|date|after_or_equal:tanggal_masuk',
        ]);

        $riwayat = RiwayatPenghuni::create($validated);
        return response()->json($riwayat, 201);
    }

    public function show($nomorRumah)
    {
        $riwayat = RiwayatPenghuni::with('warga')
            ->where('nomor_rumah', $nomorRumah)
            ->orderBy('tanggal_masuk', 'desc')
            ->get()
            ->map(function ($entry) {
                return [
                    'id' => $entry->warga->id,
                    'nama' => $entry->warga->nama,
                    'no_telepon' => $entry->warga->no_telepon,
                    'foto_ktp' => $entry->warga->foto_ktp,
                    'tanggal_masuk' => $entry->tanggal_masuk,
                    'tanggal_keluar' => $entry->tanggal_keluar,
                ];
            });

        return response()->json(['data' => $riwayat]);
    }

    public function update(Request $request, $id)
    {
        $riwayat = RiwayatPenghuni::findOrFail($id);

        $validated = $request->validate([
            'id_warga' => 'sometimes|exists:warga,id',
            'nomor_rumah' => 'sometimes|exists:rumah,nomor',
            'tanggal_masuk' => 'sometimes|date',
            'tanggal_keluar' => 'nullable|date|after_or_equal:tanggal_masuk',
        ]);

        $riwayat->update($validated);
        return response()->json($riwayat);
    }

    public function destroy($id)
    {
        RiwayatPenghuni::findOrFail($id)->delete();
        return response()->json(['message' => 'Riwayat penghuni berhasil dihapus.']);
    }
}
