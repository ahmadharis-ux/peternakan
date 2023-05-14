<?php

namespace App\Models;

use App\Models\DetailPembelianPakan;
use Illuminate\Database\Eloquent\Model;
use App\Models\OperasionalPembelianPakan;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PembelianPakan extends Model
{
    use HasFactory;
    function operasionalPembelianPakan()
    {
        return $this->hasMany(OperasionalPembelianPakan::class, 'id_pembelian_pakans');
    }
    function detailPembelianPakan()
    {
        return $this->hasMany(DetailPembelianPakan::class, 'id_pembelian_pakans');
    }
}
