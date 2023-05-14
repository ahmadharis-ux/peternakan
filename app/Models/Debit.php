<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debit extends Model
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

    public function transaksiDebit()
    {
        return $this->hasMany(TransaksiDebit::class);
    }


    public function fakturDebit()
    {
        return $this->hasMany(FakturDebit::class);
    }
}
