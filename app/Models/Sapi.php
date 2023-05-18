<?php

namespace App\Models;

use App\Models\JenisSapi;
use App\Models\RiwayatBobotSapi;
use App\Models\DetailPenjualanSapi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sapi extends Model
{

    use HasFactory;


    public function jenisSapi()
    {
        return $this->belongsTo(JenisSapi::class, 'id_jenis_sapi');
    }

    public function riwayatBobotSapi()
    {
        return $this->hasMany(RiwayatBobotSapi::class, 'id_sapi');
    }

    public function detailPenjualanSapi()
    {
        return $this->hasOne(DetailPenjualanSapi::class, 'id_sapi');
    }
}
