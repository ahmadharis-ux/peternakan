<?php

namespace App\Models;

use App\Models\User;
use App\Models\MasukTabungan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rekening extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function masukTabungan()
    {
        return $this->hasMany(MasukTabungan::class);
    }

    public static function getTotalSaldo()
    {
        return Rekening::all()->sum('saldo');
    }

    public static function pemasukan($idRekening, $nominalPemasukan)
    {
        $rekening = Rekening::find($idRekening);
        $saldoAwal = $rekening->saldo;
        $saldoBaru = $saldoAwal + $nominalPemasukan;
        $rekening->saldo = $saldoBaru;
        $rekening->save();
    }

    public static function pengeluaran($idRekening, $nominalPengeluaran)
    {
        $rekening = Rekening::find($idRekening);
        $saldoAwal = $rekening->saldo;
        $saldoBaru = $saldoAwal - $nominalPengeluaran;
        $rekening->saldo = $saldoBaru;
        $rekening->save();
    }
}
