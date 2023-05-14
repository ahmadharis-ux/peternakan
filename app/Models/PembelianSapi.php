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



    public function detailPembelianSapi()
    {
        return $this->hasMany(DetailPembelianSapi::class);
    }

    public function operasionalPembelianSapi()
    {
        return $this->hasMany(OperasionalPembelianSapi::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function kredit()
    {
        return $this->belongsTo(Kredit::class);
    }
}
