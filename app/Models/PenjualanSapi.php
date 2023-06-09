<?php

namespace App\Models;

use App\Models\User;
use App\Models\Debit;
use App\Models\DetailPenjualanSapi;
use Illuminate\Database\Eloquent\Model;
use App\Models\OperasionalPenjualanSapi;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PenjualanSapi extends Model
{

    use HasFactory;

    protected $guarded = [
        'id'
    ];
    protected $with = ['detailPenjualanSapi', 'operasionalPenjualanSapi'];


    public function detailPenjualanSapi()
    {
        return $this->hasMany(DetailPenjualanSapi::class, 'id_penjualan_sapi');
    }

    public function operasionalPenjualanSapi()
    {
        return $this->hasMany(OperasionalPenjualanSapi::class, 'id_penjualan_sapi');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }


    public function debit()
    {
        return $this->belongsTo(Debit::class, 'id_debit');
    }
}
