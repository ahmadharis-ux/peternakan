<?php

namespace App\Models;

use App\Models\JenisSapi;
use App\Models\PembelianSapi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPembelianSapi extends Model
{



    use HasFactory;

    protected $guarded = [
        'id'
    ];
    public function pembelianSapi()
    {
        return $this->belongsTo(PembelianSapi::class, 'id_pembelian_sapi');
    }

    public function jenisSapi()
    {
        return $this->belongsTo(JenisSapi::class, 'id_jenis_sapi');
    }
}
