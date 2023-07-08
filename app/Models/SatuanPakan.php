<?php

namespace App\Models;

use App\Models\StockPakan;
use App\Models\PemakaianPakan;
use App\Models\DetailPembelianPakan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SatuanPakan extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    function pemakaianPakan()
    {
        return $this->hasMany(PemakaianPakan::class, 'id_satuan_pakan');
    }
    function stockPakan()
    {
        return $this->hasMany(StokPakan::class, 'id_satuan_pakan');
    }
    function detailPembelianPakan()
    {
        return $this->hasMany(DetailPembelianPakan::class, 'id_satuan_pakan');
    }
}
