<?php

namespace App\Models;

use App\Models\PembelianPakan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OperasionalPembelianPakan extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];
    function pembelianPakan()
    {
        return $this->belongsTo(PembelianPakan::class);
    }
}
