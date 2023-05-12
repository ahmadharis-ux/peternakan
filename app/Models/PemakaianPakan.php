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
    function Pakan()
    {
        return $this->belongsTo(Pakan::class);
    }
    function SatuanPakan()
    {
        return $this->belongsTo(SatuanPakan::class);
    }
    function DetailPemakaianPakan()
    {
        return $this->hasMany(DetailPemakaianPakan::class, 'id_pemakaian_pakan');
    }

    function User()
    {
        return $this->belongsTo(User::class);
    }

    function Pekerja()
    {
        return $this->belongsTo(User::class);
    }
}
