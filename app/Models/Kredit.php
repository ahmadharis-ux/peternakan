<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kredit extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pihakKedua()
    {
        return $this->belongsTo(User::class);
    }

    public function jurnal()
    {
        return $this->belongsTo(Jurnal::class);
    }

    public function transaksiKredit()
    {
        return $this->hasMany(TransaksiKredit::class);
    }


    public function fakturKredit()
    {
        return $this->hasMany(FakturKredit::class);
    }
}
