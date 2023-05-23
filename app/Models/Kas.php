<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kas extends Model
{
    use HasFactory;


    public function kredit()
    {
        return $this->hasMany(Kredit::class);
    }

    public function debit()
    {
        return $this->hasMany(Debit::class);
    }

    public static function getAll()
    {
        $kolomDipilih = [
            'id',
            'id_jurnal',
            'id_author',
            'id_pihak_kedua',
            'nominal',
            'keterangan',
            'lunas',
            'created_at',
        ];

        $kredit = DB::table('kredits')->select($kolomDipilih);
        $debit = DB::table('debits')->select($kolomDipilih);

        return $kredit->union($debit)->orderBy('created_at')->get();
    }

    public static function getByIdJurnal($idJurnal)
    {
        $kolomDipilih = [
            'id',
            'id_jurnal',
            'id_author',
            'id_pihak_kedua',
            'nominal',
            'keterangan',
            'lunas',
            'created_at',
        ];

        $kredit = DB::table('kredits')->select($kolomDipilih)->where('id_jurnal', $idJurnal);

        $debit = DB::table('debits')->select($kolomDipilih)->where('id_jurnal', $idJurnal);



        return $kredit->union($debit)->orderBy('created_at')->get();
    }
}
