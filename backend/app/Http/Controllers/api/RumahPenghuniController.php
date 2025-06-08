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
                ->select('id', 'nama', 'nomor_rumah', 'status_hunian', 'foto_ktp');
        }])->get(['nomor']);

        $result = $data->map(function ($rumah) {
            $penghuni = $rumah->warga;

            return [
                'nomor_rumah' => $rumah->nomor,
                'status_rumah' => $penghuni->isNotEmpty() ? 'Dihuni' : 'Tidak dihuni',
                'penghuni' => $penghuni->map(function ($warga) {
                    return [
                        'nama' => $warga->nama,
                        'status_hunian' => $warga->status_hunian,
                        'foto_ktp' => $warga->foto_ktp,
                    ];
                }),
            ];
        });

        return response()->json($result);
    }
}
