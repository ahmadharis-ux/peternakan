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
    protected $with = [
        'jurnal',
        'user',
        'pihakKedua',
        'pembelianSapi',
        'pembelianPakan',
        'transaksiKredit'
    ];

    public function kas()
    {
        return $this->belongsTo(Kas::class, 'id_kas');
    }

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

    public function pembelianPakan()
    {
        return $this->hasOne(PembelianPakan::class, 'id_kredit');
    }


    public static function idTerakhir()
    {
        return Kredit::latest()->get()[0]->id;
    }


    public static function getTotalNominal()
    {
        return Kredit::all()->sum('nominal');
    }

    public static function tambahNominal($idKredit, $nominalTambahan)
    {
        $kredit = Kredit::find($idKredit);
        $nominalAsal = $kredit->nominal;
        $nominalBaru = $nominalAsal + $nominalTambahan;
        $kredit->nominal = $nominalBaru;
        $kredit->save();
    }

    public static function getNominalTerbayar($idKredit)
    {
        $kredit = Kredit::find($idKredit);
        return $kredit->transaksiKredit->sum('nominal');
    }

    public static function getSisaPembayaran($idKredit)
    {
        $kredit = Kredit::find($idKredit);
        $nominalTerbayar = Kredit::getNominalTerbayar($idKredit);
        $sisaPembayaran = $kredit->nominal - $nominalTerbayar;

        return $sisaPembayaran;
    }

    public static function updateStatusLunas($idKredit)
    {
        $kredit = Kredit::find($idKredit);
        if (Kredit::getSisaPembayaran($idKredit) > 0) {
            $kredit->lunas = false;
            $kredit->save();
            return;
        }

        $kredit->lunas = true;
        $kredit->save();
    }

    public static function getHutangPakan()
    {
        return Kredit::where('id_jurnal', 3)->get();
    }
    public static function getHutangGaji()
    {
        return Kredit::where('id_jurnal', 4)->get();
    }

    public static function getHutangSapi()
    {
        return Kredit::where('id_jurnal', 1)->get();
    }

    public static function getTotalTransaksi($listKredit)
    {
        $totalTransaksi = 0;

        foreach ($listKredit as $kredit) {
            $listTransaksi = $kredit->transaksiKredit;

            foreach ($listTransaksi as $transaksi) {
                $totalTransaksi += $transaksi->nominal;
            }
        }

        return $totalTransaksi;
    }
}
