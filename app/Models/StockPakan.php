<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockPakan extends Model
{
    use HasFactory;

    function Pakan(){
        return $this->belongsTo(Pakan::class);
    }
    function SatuanPakan(){
        return $this->belongsTo(SatuanPakan::class);
    }
}
