<?php

namespace App\Models;

use App\Models\PenjualanSapi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OperasionalPenjualanSapi extends Model
{
    use HasFactory;

    public function PenjualanSapi(): BelongsTo
    {
        return $this->belongsTo(PenjualanSapi::class);
    }
}
