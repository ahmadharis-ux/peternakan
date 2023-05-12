<?php

namespace App\Models;

use App\Models\PemakaianPakan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPemakaianPakan extends Model
{
    use HasFactory;
    function PemakaianPakan()
    {
        return $this->belongsTo(PemakaianPakan::class);
    }
}
