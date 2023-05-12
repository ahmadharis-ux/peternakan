<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPembelianPakan extends Model
{
    use HasFactory;
    
    function Pakan(){
        return $this->belongsTo(Pakan::class);
    }
    function SatuanPakan(){
        return $this->belongsTo(SatuanPakan::class);
    }
    function PembelianPakan(){
        return $this->belongsTo(PembelianPakan::class);
    }
}
