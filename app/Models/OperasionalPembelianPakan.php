<?php

namespace App\Models;

use App\Models\PembelianPakan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OperasionalPembelianPakan extends Model
{
    use HasFactory;
    function PembelianPakan()
    {
        return $this->belongsTo(PembelianPakan::class);
    }
}
