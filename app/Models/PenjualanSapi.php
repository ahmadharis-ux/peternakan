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




    public function DetailPenjualanSapi(): HasMany
    {
        return $this->hasMany(DetailPenjualanSapi::class);
    }

    public function OperasionalPenjualanSapi(): HasMany
    {
        return $this->hasMany(OperasionalPenjualanSapi::class);
    }


    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function Debit(): BelongsTo
    {
        return $this->belongsTo(Debit::class);
    }
}
