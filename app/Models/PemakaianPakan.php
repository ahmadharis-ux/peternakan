<?php

namespace App\Models;

use App\Models\User;
use App\Models\Pakan;
use App\Models\SatuanPakan;
use App\Models\DetailPemakaianPakan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PemakaianPakan extends Model
{
    protected $with = [
        'detailPemakaianPakan',
        'markup'
    ];


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
        return $this->hasMany(DetailPemakaianPakan::class, 'id_pemakaian_pakan');
    }

    function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    function pekerja()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    function markup()
    {
        return $this->hasMany(MarkupSapi::class, 'id_pemakaian_pakan');
    }

    public static function getIdTerakhir()
    {
        return PemakaianPakan::latest()->get()[0]->id;
    }
}
