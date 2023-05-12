<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pakan extends Model
{
    use HasFactory;

    function DetailPembelianPakan(){
        return $this->hasMany(DetailPemakaianPakan::class,'id_pakan');
    }
    function DetailPemakaianPakan(){
        return $this->hasMany(DetailPemakaianPakan::class,'id_pakan');
    }
    function PemakaianPakan(){
        return $this->hasMany(PemakaianPakan::class,'id_pakan');
    }
    function StockPakan(){
        return $this->hasMany(StockPakan::class,'id_pakan');
    }
}
