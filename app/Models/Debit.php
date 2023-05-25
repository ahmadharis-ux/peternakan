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

    // protected $with = ['jurnal', 'user', 'pihakKedua', 'penjualanSapi', 'transaksiDebit'];
    protected $with = [
        'jurnal',
        'user',
        'pihakKedua',
        'penjualanSapi',
        'transaksiDebit',
    ];


    public function kas()
    {
        return $this->belongsTo(Kas::class, 'id_kas');
    }

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



    public function penjualanSapi()
    {
        return $this->hasOne(PenjualanSapi::class, 'id_debit');
    }

    public function transaksiDebit()
    {
        return $this->hasMany(TransaksiDebit::class, 'id_debit');
    }


    public function fakturDebit()
    {
        return $this->hasMany(FakturDebit::class);
    }

    public static function idTerakhir()
    {
        return Debit::latest()->get()[0]->id;
    }

    public static function getTotalNominal()
    {
        return Debit::all()->sum('nominal');
    }

    public static function tambahNominal($idDebit, $nominalTambahan)
    {
        $debit = Debit::find($idDebit);
        $nominalAsal = $debit->nominal;
        $nominalBaru = $nominalAsal + $nominalTambahan;
        $debit->nominal = $nominalBaru;
        $debit->save();
    }

    public static function getNominalTerbayar($idDebit)
    {
        $debit = Debit::find($idDebit);
        return $debit->transaksiDebit->sum('nominal');
    }

    public static function getSisaPembayaran($idDebit)
    {
        $debit = Debit::find($idDebit);
        $nominalTerbayar = Debit::getNominalTerbayar($idDebit);
        $sisaPembayaran = $debit->nominal - $nominalTerbayar;

        return $sisaPembayaran;
    }

    public static function updateStatusLunas($idDebit)
    {
        $debit = Debit::find($idDebit);
        if (Debit::getSisaPembayaran($idDebit) > 0) {
            $debit->lunas = false;
            $debit->save();
            return;
        }

        $debit->lunas = true;
        $debit->save();
    }
}
