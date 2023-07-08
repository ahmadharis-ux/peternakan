<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkupSapi extends Model
{
    use HasFactory;

    protected $with = ['sapi'];
    protected $guarded = [
        'id'
    ];
    function pemakaianPakan()
    {
        return $this->belongsTo(PemakaianPakan::class, 'id_pemakaian_pakan');
    }


    function sapi()
    {
        return $this->belongsTo(Sapi::class, 'id_sapi');
    }
}
