<?php

namespace App\Http\Controllers\accounting;

use App\Models\Debit;
use App\Models\Rekening;
use Illuminate\Http\Request;
use App\Models\TransaksiDebit;
use App\Http\Controllers\Controller;

class DebitController extends Controller
{
    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }

    public function storeTransaksi(Request $request)
    {
        // $that = Debit::getSisaPembayaran(1);
        // return $that;

        $idDebit = $request->id_debit;
        $idRekening = $request->id_rekening;
        $sisaDebit = Debit::getSisaPembayaran($idDebit);
        $nominalBayar = $request->nominal;


        if ($nominalBayar > $sisaDebit) {
            return redirect()->back()->withErrors('Nominal pembayaran melebihi sisa debit!');
        }

        // return $request;

        $transaksiDebit = [
            "id_debit" => $idDebit,
            "id_author" => auth()->user()->id,
            "id_pihak_kedua" => Debit::find($idDebit)->id_pihak_kedua,
            "id_rekening" => $idRekening,
            "nominal" => $nominalBayar,
        ];

        TransaksiDebit::create($transaksiDebit);
        Debit::updateStatusLunas($idDebit);
        Rekening::pemasukan($idRekening, $nominalBayar);

        return redirect()->back();
    }


    public function show(Debit $debit)
    {
        //
    }

    public function edit(Debit $debit)
    {
        //
    }
    public function update(Request $request, Debit $debit)
    {
        //
    }

    public function destroy(Debit $debit)
    {
        //
    }
}
