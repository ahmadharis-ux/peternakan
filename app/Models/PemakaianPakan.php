<?php

namespace App\Models;

use App\Models\Pakan;
use App\Models\SatuanPakan;
use App\Models\DetailPemakaianPakan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PemakaianPakan extends Model
{
    use HasFactory;
    function pakan()
    {
        return $this->belongsTo(Pakan::class);
    }
    function satuanPakan()
    {
        return $this->belongsTo(SatuanPakan::class);
    }
    function detailPemakaianPakan()
    {
        return $this->hasMany(DetailPemakaianPakan::class, 'id_pemakaian_pakans');
    }

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function pekerja()
    {
        return $this->belongsTo(User::class);
    }
}
