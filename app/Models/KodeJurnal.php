<?php

namespace App\Models;

use App\Models\Jurnal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KodeJurnal extends Model
{
    use HasFactory;


    public function Jurnal(): HasMany
    {
        return $this->hasMany(Jurnal::class, 'foreign_key', 'local_key');
    }
}
