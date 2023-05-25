<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kas extends Model
{
    use HasFactory;

    protected $with = ['kredit', 'debit'];

    public function kredit()
    {
        return $this->hasOne(Kredit::class, 'id_kas');
    }

    public function debit()
    {
        return $this->hasOne(Debit::class, 'id_kas');
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

    public static function idTerakhir()
    {
        return Kas::latest()->get()[0]->id;
    }

    public static function kreditBaru()
    {
        Kas::insert([
            "is_kredit" => true,
            "created_at" => carbonToday(),
        ]);
    }

    public static function debitBaru()
    {
        Kas::insert([
            "is_kredit" => false,
            "created_at" => carbonToday(),
        ]);
    }

    public static function getView()
    {
        $listKas = Kas::all();

        $kasView = $listKas->map(function ($kas) {
            $category = $kas->is_kredit ? 'kredit' : 'debit';

            $kas->pihakKedua = $kas[$category]->pihakKedua->nama_depan;
            $kas->jurnal = $kas[$category]->jurnal->nama;
            $kas->keterangan = $kas[$category]->keterangan;
            $kas->nominal = $kas[$category]->nominal;
            $kas->linkDetail = '/acc/' . strtolower($kas->jurnal) . '/' . $kas[$category]->id;


            return $kas;
        });

        return $kasView;
    }
}
