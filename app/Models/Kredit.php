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
    protected $with = ['jurnal', 'user', 'pihakKedua', 'pembelianSapi', 'pembelianPakan', 'transaksiKredit'];

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
        return $this->hasMany(TransaksiKredit::class, 'id_kredit');
    }


    public function fakturKredit()
    {
        return $this->hasMany(FakturKredit::class, 'id_kredit');
    }

    public function pembelianSapi()
    {
        return $this->hasOne(PembelianSapi::class, 'id_kredit');
    }

    public function penjualanSapi()
    {
        return $this->hasMany(PenjualanSapi::class, 'id_kredit');
    }

    public function pembelianPakan()
    {
        return $this->hasMany(PembelianPakan::class, 'id_kredit');
    }

    public static function tambahNominal($idKredit, $nominalTambahan)
    {
        $kredit = Kredit::find($idKredit);
        $nominalAsal = $kredit->nominal;
        $nominalBaru = $nominalAsal + $nominalTambahan;
        $kredit->nominal = $nominalBaru;
        $kredit->save();
    }
}
