<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RiwayatPenghuni extends Model
{
      use HasFactory;

    protected $table = 'riwayat_penghuni';

    protected $fillable = [
        'id_warga',
        'nomor_rumah',
        'tanggal_masuk',
        'tanggal_keluar',
    ];

    // Relasi ke Warga
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'id_warga');
    }

    // Relasi ke Rumah
    public function rumah()
    {
        return $this->belongsTo(Rumah::class, 'nomor_rumah', 'nomor');
    }
}
