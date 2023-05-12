<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianPakan extends Model
{
    use HasFactory;
    function OperasionalPembelianPakan(){
        return $this->hasMany(OperasionalPembelianPakan::class,'id_pembelian_pakan');
    }
    function DetailPembelianPakan(){
        return $this->hasMany(DetailPembelianPakan::class,'id_pembelian_pakan');
    }
}
