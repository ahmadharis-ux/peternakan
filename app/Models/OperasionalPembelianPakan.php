<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperasionalPembelianPakan extends Model
{
    use HasFactory;
    function PembelianPakan(){
        return $this->belongsTo(PembelianPakan::class);
    }
}
