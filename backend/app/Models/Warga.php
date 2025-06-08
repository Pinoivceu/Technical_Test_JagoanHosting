<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

   protected $table = 'warga';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'nomor_rumah',
        'status_hunian',
        'status_perkawinan',
        'no_telepon',
        'foto_ktp',
        'aktif',
    ];

    /**
     * Relasi ke model Rumah
     */
    public function rumah()
    {
        return $this->belongsTo(Rumah::class, 'nomor_rumah', 'nomor');
    }

    /**
     * Relasi ke riwayat penghuni (jika digunakan)
     */
    public function riwayatPenghuni()
    {
        return $this->hasMany(RiwayatPenghuni::class, 'id_warga');
    }
}
