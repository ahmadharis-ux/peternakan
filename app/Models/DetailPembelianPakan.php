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

    function Pakan()
    {
        return $this->belongsTo(Pakan::class);
    }
    function SatuanPakan()
    {
        return $this->belongsTo(SatuanPakan::class);
    }
    function PembelianPakan()
    {
        return $this->belongsTo(PembelianPakan::class);
    }
}
