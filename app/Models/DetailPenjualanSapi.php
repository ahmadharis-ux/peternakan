<?php

namespace App\Models;

use App\Models\Sapi;
use App\Models\PenjualanSapi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPenjualanSapi extends Model
{
    use HasFactory;

    public function Sapi(): Has
    {
        return $this->has(Sapi::class);
    }

    public function PenjualanSapi(): BelongsTo
    {
        return $this->belongsTo(PenjualanSapi::class);
    }
}
