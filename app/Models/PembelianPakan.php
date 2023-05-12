<?php

namespace App\Models;

use App\Models\DetailPembelianPakan;
use Illuminate\Database\Eloquent\Model;
use App\Models\OperasionalPembelianPakan;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PembelianPakan extends Model
{
    use HasFactory;
    function OperasionalPembelianPakan()
    {
        return $this->hasMany(OperasionalPembelianPakan::class, 'id_pembelian_pakan');
    }
    function DetailPembelianPakan()
    {
        return $this->hasMany(DetailPembelianPakan::class, 'id_pembelian_pakan');
    }
}
