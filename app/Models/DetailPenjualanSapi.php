<?php

namespace App\Models;

use App\Models\Sapi;
use App\Models\PenjualanSapi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPenjualanSapi extends Model
{

    use HasFactory;

    protected $with = ['sapi'];
    protected $guarded = [
        'id'
    ];
    public function sapi()
    {
        return $this->belongsTo(Sapi::class, 'id_sapi');
    }

    public function penjualanSapi()
    {
        return $this->belongsTo(PenjualanSapi::class, 'id_penjualan_sapi');
    }
}
