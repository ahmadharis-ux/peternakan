<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperasionalPembelianSapi extends Model
{
    use HasFactory;


    public function PembelianSapi()
    {
        return $this->belongsTo(PembelianSapi::class);
    }

}
