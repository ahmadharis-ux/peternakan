<?php

namespace App\Models;

use App\Models\Sapi;
use App\Models\PemakaianPakan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPemakaianPakan extends Model
{
    use HasFactory;
    function pemakaianPakan()
    {
        return $this->belongsTo(PemakaianPakan::class);
    }

    function sapi()
    {
        return $this->belongsTo(Sapi::class);
    }
}
