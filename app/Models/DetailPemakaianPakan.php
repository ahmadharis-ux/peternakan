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
        return $this->belongsTo(PemakaianPakan::class, 'id_pemakaian_pakan');
    }

    function stokPakan()
    {
        return $this->belongsTo(StokPakan::class, 'id_pemakaian_pakan');
    }
    function jumlahNilaiPemakaianPakan(){
        return DetailPemakaianPakan::all()->sum('subtotal');
    }
}
