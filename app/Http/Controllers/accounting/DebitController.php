<?php

namespace App\Http\Controllers\accounting;

use App\Models\Debit;
use App\Models\Rekening;
use Illuminate\Http\Request;
use App\Models\TransaksiDebit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
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
        $idDebit = $request->id_debit;
        $idRekening = $request->id_rekening;
        $sisaDebit = Debit::getSisaPembayaran($idDebit);
        $nominalBayar = $request->nominal;


        if ($nominalBayar > $sisaDebit) {
            if ($nominalBayar > $sisaDebit) {
                $msg = 'Nominal pembayaran melebihi sisa debit!';
                Log::error($msg);
                return redirect()->back()->withErrors($msg);
            }
        }

        DB::beginTransaction();
        try {
            Rekening::pemasukan($idRekening, $nominalBayar);

            $transaksiDebit = [
                "id_debit" => $idDebit,
                "id_author" => auth()->user()->id,
                "id_pihak_kedua" => Debit::find($idDebit)->id_pihak_kedua,
                "id_rekening" => $idRekening,
                "nominal" => $nominalBayar,
                "current_saldo" => Rekening::getTotalSaldo(),

            ];

            TransaksiDebit::create($transaksiDebit);
            Debit::updateStatusLunas($idDebit);
            DB::commit();

            return redirect()->back()->with('success', 'transaksi berhasil dilakukan');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error("trx debit gagal disimpan: $e");
            return redirect()->back()->with('error', 'transaksi gagal');
        }
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
