<?php

namespace App\Models;

use App\Models\PenjualanSapi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OperasionalPenjualanSapi extends Model
{

    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function penjualanSapi()
    {
        return $this->belongsTo(PenjualanSapi::class, 'id_penjualan_sapi');
    }
}
