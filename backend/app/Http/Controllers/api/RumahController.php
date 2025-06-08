<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rumah;

class RumahController extends Controller
{
    public function index()
    {
        $data = Rumah::all();
        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor' => 'required|integer|unique:rumah,nomor',
            'berpenghuni' => 'required|bool', 
        ]);

        $rumah = Rumah::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data rumah berhasil ditambahkan',
            'data' => $rumah,
        ]);
    }

    public function show($nomor)
    {
        $rumah = Rumah::find($nomor);
        if (!$rumah) {
            return response()->json([
                'success' => false,
                'message' => 'Rumah tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $rumah,
        ]);
    }

    public function update(Request $request, $nomor)
    {
        $rumah = Rumah::find($nomor);
        if (!$rumah) {
            return response()->json([
                'success' => false,
                'message' => 'Rumah tidak ditemukan',
            ], 404);
        }

        $request->validate([
            'status_rumah' => 'required|in:aktif,tidak_aktif',
        ]);

        $rumah->update($request->only('status_rumah'));

        return response()->json([
            'success' => true,
            'message' => 'Data rumah berhasil diperbarui',
            'data' => $rumah,
        ]);
    }

    public function destroy($nomor)
    {
        $rumah = Rumah::find($nomor);
        if (!$rumah) {
            return response()->json([
                'success' => false,
                'message' => 'Rumah tidak ditemukan',
            ], 404);
        }

        $rumah->delete();

        return response()->json([
            'success' => true,
            'message' => 'Rumah berhasil dihapus',
        ]);
    }
}
