<?php

namespace App\Models;

use App\Models\User;
use App\Models\Jurnal;
use App\Models\FakturKredit;
use App\Models\PembelianSapi;
use App\Models\PenjualanSapi;
use App\Models\TransaksiKredit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kredit extends Model
{
    use HasFactory;
    protected $with = ['jurnal', 'user', 'pihakKedua', 'pembelianSapi', 'pembelianPakan'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_author');
    }

    public function pihakKedua()
    {
        return $this->belongsTo(User::class, 'id_pihak_kedua');
    }

    public function jurnal()
    {
        return $this->belongsTo(Jurnal::class, 'id_jurnal');
    }

    public function transaksiKredit()
    {
        return $this->hasMany(TransaksiKredit::class);
    }


    public function fakturKredit()
    {
        return $this->hasMany(FakturKredit::class);
    }

    public function pembelianSapi()
    {
        return $this->hasMany(PembelianSapi::class);
    }

    public function penjualanSapi()
    {
        return $this->hasMany(PenjualanSapi::class);
    }
}
