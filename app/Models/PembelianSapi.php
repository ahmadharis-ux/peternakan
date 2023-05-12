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



    public function DetailPembelianSapi()
    {
        return $this->hasMany(DetailPembelianSapi::class);
    }

    public function OperasionalPembelianSapi()
    {
        return $this->hasMany(OperasionalPembelianSapi::class);
    }


    public function User()
    {
        return $this->belongsTo(User::class);
    }


    public function Kredit()
    {
        return $this->belongsTo(Kredit::class);
    }
}
