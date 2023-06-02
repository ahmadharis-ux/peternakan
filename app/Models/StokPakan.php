<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokPakan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['harga', 'qty'];

    protected $with = ['pakan', 'satuanPakan'];

    function pakan()
    {
        return $this->belongsTo(Pakan::class, 'id_pakan');
    }
    function satuanPakan()
    {
        return $this->belongsTo(SatuanPakan::class, 'id_satuan_pakan');
    }

    function detailPemakaianPakan()
    {
        return $this->hasMany(DetailPemakaianPakan::class, 'id_stok_pakan');
    }

    function getSisaPakan(){
        return StokPakan::all()->sum('stok');
    }
    
}
