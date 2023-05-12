<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
