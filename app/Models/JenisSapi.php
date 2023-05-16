<?php

namespace App\Models;

use App\Models\Sapi;
use App\Models\DetailPembelianSapi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisSapi extends Model
{

    use HasFactory;


    public function sapi()
    {
        return $this->HasMany(Sapi::class);
    }

    public function detailPembelianSapi()
    {
        return $this->HasMany(DetailPembelianSapi::class);
    }
}
