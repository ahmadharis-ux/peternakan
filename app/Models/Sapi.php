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
        return $this->belongsTo(JenisSapi::class);
    }

    public function riwayatBobotSapi()
    {
        return $this->HasMany(RiwayatBobotSapi::class);
    }

    public function detailPenjualanSapi()
    {
        return $this->hasMany(DetailPenjualanSapi::class,'id_sapi');
    }
}
