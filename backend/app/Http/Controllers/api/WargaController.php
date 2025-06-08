<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RiwayatPenghuni;
use App\Models\Warga;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class WargaController extends Controller
{
    // Tampilkan semua warga
    public function index()
    {
        $warga = Warga::all();
        return response()->json([
            'success' => true,
            'data' => $warga
        ]);
    }

    // Simpan data warga baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'jenis_kelamin' => 'sometimes|required|in:laki,perempuan',
            'nomor_rumah' => 'nullable|exists:rumah,nomor',
            'status_hunian' => 'sometimes|required|in:kontrak,tetap',
            'status_perkawinan' => 'sometimes|required|in:menikah,lajang,bercerai',
            'no_telepon' => 'sometimes|required|string|max:20',
            'foto_ktp' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'aktif' => 'sometimes|boolean',
        ]);

        if ($request->hasFile('foto_ktp')) {
            $file = $request->file('foto_ktp');
            $path = $file->store('foto_ktp', 'local');
            $validatedData['foto_ktp'] = basename($path);
        }

        $warga = Warga::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Warga berhasil ditambahkan',
            'data' => $warga,
        ], 201);
    }


    // Update data warga
    public function update(Request $request, $id)
    {
        $warga = Warga::find($id);
        if (!$warga) {
            return response()->json([
                'success' => false,
                'message' => 'Warga tidak ditemukan'
            ], 404);
        }

        $validatedData = $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'jenis_kelamin' => 'sometimes|required|in:laki,perempuan',
            'nomor_rumah' => 'nullable|exists:rumah,nomor',
            'status_hunian' => 'sometimes|required|in:kontrak,tetap',
            'status_perkawinan' => 'sometimes|required|in:menikah,lajang,bercerai',
            'no_telepon' => 'sometimes|required|string|max:20',
            'foto_ktp' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'aktif' => 'sometimes|boolean',
        ]);

        if ($request->hasFile('foto_ktp')) {
            $file = $request->file('foto_ktp');
            $path = $file->store('foto_ktp', 'local');
            $validatedData['foto_ktp'] = basename($path);
        }

        $warga->update($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Warga berhasil diperbarui',
            'data' => $warga
        ]);
    }

    public function nonaktifkan($id)
    {
        $warga = Warga::find($id);
        if (!$warga) {
            return response()->json([
                'success' => false,
                'message' => 'Warga tidak ditemukan'
            ], 404);
        }

        // Jika dia memiliki rumah, buat entri riwayat
        if ($warga->nomor_rumah) {
            RiwayatPenghuni::create([
                'id_warga' => $warga->id,
                'nomor_rumah' => $warga->nomor_rumah,
                'tanggal_masuk' => $warga->created_at ?? now()->subMonths(1), // fallback
                'tanggal_keluar' => now(),
            ]);
        }

        // Set aktif = false dan nomor_rumah = null (agar dianggap tidak menempati rumah lagi)
        $warga->aktif = false;
        $warga->nomor_rumah = null;
        $warga->save();

        return response()->json([
            'success' => true,
            'message' => 'Warga berhasil dinonaktifkan dan history disimpan',
            'data' => $warga
        ]);
    }


    // Hapus data warga
    public function destroy($id)
    {
        $warga = Warga::find($id);
        if (!$warga) {
            return response()->json([
                'success' => false,
                'message' => 'Warga tidak ditemukan'
            ], 404);
        }

        $warga->delete();

        return response()->json([
            'success' => true,
            'message' => 'Warga berhasil dihapus'
        ]);
    }
}
