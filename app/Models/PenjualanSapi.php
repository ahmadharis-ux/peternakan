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




    public function detailPenjualanSapi()
    {
        return $this->hasMany(DetailPenjualanSapi::class);
    }

    public function operasionalPenjualanSapi()
    {
        return $this->hasMany(OperasionalPenjualanSapi::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function debit()
    {
        return $this->belongsTo(Debit::class);
    }
}
