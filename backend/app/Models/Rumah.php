<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rumah extends Model
{
    protected $table = 'rumah';
    protected $primaryKey = 'nomor';
    protected $keyType = 'int';

    protected $fillable = [
        'nomor',
        'berpenghuni',
    ];

        public function warga()
    {
        return $this->hasMany(Warga::class ,'nomor_rumah', 'nomor');
    }

    public function histori()
    {
        return $this->hasMany(RiwayatPenghuni::class);
    }
}
