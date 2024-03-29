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

    protected $with = [
        "pakan",
        "satuanPakan"
    ];

    protected $guarded = [
        'id'
    ];

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

    public static function jumlahNilaiPembelianPakan()
    {
        return DetailPembelianPakan::sum('subtotal');
    }
}
