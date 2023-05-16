<?php

namespace App\Models;

use App\Models\User;
use App\Models\Jurnal;
use App\Models\FakturDebit;
use App\Models\TransaksiDebit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Debit extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function pihakKedua()
    {
        return $this->belongsTo(User::class, 'id_pihak_kedua');
    }

    public function jurnal()
    {
        return $this->belongsTo(Jurnal::class, 'id_jurnal');
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
