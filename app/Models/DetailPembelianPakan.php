<?php

namespace App\Models;

use App\Models\Pakan;
use App\Models\SatuanPakan;
use App\Models\PembelianPakan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPembelianPakan extends Model
{
    use HasFactory;

    function pakan()
    {
        return $this->belongsTo(Pakan::class, 'id_pakan');
    }
    function satuanPakan()
    {
        return $this->belongsTo(SatuanPakan::class, 'id_satuan_pakan');
    }
    function pembelianPakan()
    {
        return $this->belongsTo(PembelianPakan::class, 'id_pembelian_pakan');
    }
    function jumlahNilaiPembelianPakan(){
        return DetailPembelianPakan::all()->sum('subtotal');
    }
}
