<?php

namespace App\Models;

use App\Models\User;
use App\Models\Kredit;
use App\Models\DetailPembelianSapi;
use Illuminate\Database\Eloquent\Model;
use App\Models\OperasionalPembelianSapi;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PembelianSapi extends Model
{
    use HasFactory;

    protected $with = ['detailPembelianSapi', 'operasionalPembelianSapi'];

    public function detailPembelianSapi()
    {
        return $this->hasMany(DetailPembelianSapi::class, 'id_pembelian_sapi');
    }

    public function operasionalPembelianSapi()
    {
        return $this->hasMany(OperasionalPembelianSapi::class, 'id_pembelian_sapi');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }


    public function kredit()
    {
        return $this->belongsTo(Kredit::class, 'id_kredit');
    }
}
