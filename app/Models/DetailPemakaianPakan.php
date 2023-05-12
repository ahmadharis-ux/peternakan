<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPemakaianPakan extends Model
{
    use HasFactory;
    function Pakan(){
        return $this->belongsTo(Pakan::class);
    }
    function PemakaianPakan(){
        return $this->belongsTo(PemakaianPakan::class);
    }
}
