<?php

namespace App\Models;

use App\Models\JenisSapi;
use App\Models\PembelianSapi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPembelianSapi extends Model
{

    use HasFactory;


    public function PembelianSapi()
    {
        return $this->belongsTo(PembelianSapi::class);
    }

    public function JenisSapi()
    {
        return $this->belongsTo(JenisSapi::class);
    }
}
