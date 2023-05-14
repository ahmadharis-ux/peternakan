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


    public function JenisSapi()
    {
        return $this->belongsTo(JenisSapi::class);
    }

    public function RiwayatBobotSapi()
    {
        return $this->HasMany(RiwayatBobotSapi::class);
    }

    public function DetailPenjualanSapi()
    {
        return $this->HasMany(DetailPenjualanSapi::class);
    }
}