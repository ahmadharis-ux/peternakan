<?php

namespace App\Models;

use App\Models\Pakan;
use App\Models\SatuanPakan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StockPakan extends Model
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
}
