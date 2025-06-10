<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rumah;

class RumahPenghuniController extends Controller
{
    public function index()
    {
        $data = Rumah::with(['warga' => function ($query) {
            $query->where('aktif', true)
                ->select('id', 'nama', 'nomor_rumah', 'status_hunian', 'no_telepon', 'created_at', 'foto_ktp');
        }])->get(['nomor']);

        $result = $data->map(function ($rumah) {
            $penghuni = $rumah->warga;
            $penghuniPertama = $penghuni->first();

            return [
                'nomor_rumah' => $rumah->nomor,
                'status_hunian' => $penghuniPertama ? $penghuniPertama->status_hunian : null,
                'status_rumah' => $penghuni->isNotEmpty() ? 'Dihuni' : 'Tidak dihuni',
                'penghuni' => $penghuni->map(function ($warga) {
                    return [
                        'id' => $warga->id,
                        'nama' => $warga->nama,
                        'foto_ktp' => $warga->foto_ktp,
                        'no_telepon' => $warga->no_telepon,
                        'tanggal_masuk' => $warga->created_at,
                    ];
                }),
            ];
        });

        return response()->json($result);
    }

    public function show($nomor)
    {
        $rumah = Rumah::with(['warga' => function ($query) {
            $query->where('aktif', true)
                ->select('id', 'nama', 'nomor_rumah','status_hunian', 'no_telepon', 'created_at', 'foto_ktp');
        }])->where('nomor', $nomor)->first(['nomor']);

        if (!$rumah) {
            return response()->json(['message' => 'Rumah tidak ditemukan'], 404);
        }

        $penghuni = $rumah->warga;
        $penghuniPertama = $penghuni->first();

        $result = [
            'nomor_rumah' => $rumah->nomor,
            'status_hunian' => $penghuniPertama ? $penghuniPertama->status_hunian : null,
            'status_rumah' => $penghuni->isNotEmpty() ? 'Dihuni' : 'Tidak dihuni',
            'penghuni' => $penghuni->map(function ($warga) {
                return [
                    'id' => $warga->id,
                    'nama' => $warga->nama,
                    'foto_ktp' => $warga->foto_ktp,
                    'no_telepon' => $warga->no_telepon,
                    'tanggal_masuk' => $warga->created_at,
                ];
            }),
        ];

        return response()->json($result);
    }
}
