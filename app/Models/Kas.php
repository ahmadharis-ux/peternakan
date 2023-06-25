<?php

namespace App\Models;

use App\Models\Debit;
use App\Models\Kredit;
use App\Models\TransaksiDebit;
use App\Models\TransaksiKredit;
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
            "created_at" => carbonNow(),
        ]);
    }

    public static function debitBaru()
    {
        Kas::insert([
            "is_kredit" => false,
            "created_at" => carbonNow(),
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

    public static function getHistoryTransaksi()
    {
        // hampura heeh, skema urang asa ruwet kieu. kudu make sql manual sagala wkwkwk

        $query = "SELECT
                    id, id_author, id_pihak_kedua, id_kredit, null as id_debit, id_rekening, nominal, keterangan, adm, created_at, updated_at
                    FROM transaksi_kredits
                UNION ALL
                SELECT
                    id, id_author, id_pihak_kedua, null as id_kredit, id_debit, id_rekening, nominal, keterangan, null as adm, created_at, updated_at
                FROM transaksi_debits

                ORDER BY created_at";

        $histori = collect(DB::select($query));

        $listIdAuthor = $histori->map(function ($h) {
            return $h->id_author;
        })->unique();

        $listIdPihakKedua = $histori->map(function ($h) {
            return $h->id_pihak_kedua;
        })->unique();

        $listIdUser = $listIdAuthor->concat($listIdPihakKedua);
        $listUser = collect(User::whereIn('id', $listIdUser)->get());

        $listDebit = collect(Debit::all());
        $listKredit = collect(Kredit::all());

        // set author, pihak kedua, debit, kredit, jurnal
        $histori->each(function ($h) use ($listUser, $listDebit, $listKredit) {
            $author = $listUser->where('id', $h->id_author)->first();
            $pihakKedua = $listUser->where('id', $h->id_pihak_kedua)->first();

            $h->author = $author;
            $h->pihakKedua = $pihakKedua;
            User::getFullname($h->pihakKedua);

            $h->isKredit = isset($h->id_kredit);

            if ($h->isKredit) {
                $h->kredit = $listKredit->where('id', $h->id_kredit)->first();
                $h->jurnal = $h->kredit->jurnal;
                $idKredit = $h->kredit->id;
                $h->linkDetail = "/acc/piutang/$idKredit";
            } else {
                $h->debit = $listDebit->where('id', $h->id_debit)->first();
                $h->jurnal = $h->debit->jurnal;
                $idDebit = $h->debit->id;
                $h->linkDetail = "/acc/piutang/$idDebit";
            }
        });

        return $histori;

        // dd($listIdAuthor, $listIdPihakKedua);
        // dd($listIdUser);
    }
}
