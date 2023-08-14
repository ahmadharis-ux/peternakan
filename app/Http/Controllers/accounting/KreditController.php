<?php

namespace App\Http\Controllers\accounting;

use App\Models\User;
use App\Models\Kredit;
use App\Models\Rekening;
use Illuminate\Http\Request;
use App\Models\TransaksiKredit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class KreditController extends Controller
{

    public function index()
    {
        $listSupplierSapi = User::where('id_role', '5')->get();
        $pageData = [
            'title' => "Buku - Hutang",
            'heading' => "Buku - Hutang",
            'active' => "buku",
            'kredit' => Kredit::all(),
            'listSupplierSapi' => $listSupplierSapi,
        ];

        return view('accounting.kredit.index', $pageData);
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
        // return $request;

        $idKredit = $request->id_kredit;
        $idRekening = $request->id_rekening;
        $sisaKredit = Kredit::getSisaPembayaran($idKredit);
        $nominalBayar = $request->nominal;
        $adm = $request->adm;

        if ($nominalBayar > $sisaKredit) {
            $msg = 'Nominal pembayaran melebihi sisa kredit!';
            Log::error($msg);
            return redirect()->back()->withErrors($msg);
        }

        DB::beginTransaction();
        try {
            Rekening::pengeluaran($idRekening, $nominalBayar + $adm);

            $transaksiKredit = [
                "id_kredit" => $idKredit,
                "id_author" => auth()->user()->id,
                "id_pihak_kedua" => Kredit::find($idKredit)->id_pihak_kedua,
                "id_rekening" => $idRekening,
                "nominal" => $nominalBayar,
                "keterangan" => $request->keterangan,
                "adm" => $adm,
                "current_saldo" => Rekening::getTotalSaldo(),
            ];

            TransaksiKredit::create($transaksiKredit);
            Kredit::updateStatusLunas($idKredit);

            DB::commit();

            return redirect()->back()->with('success', 'transaksi berhasil dilakukan');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error("trx kredit gagal disimpan: $e");
            return redirect()->back()->with('error', 'transaksi gagal');
        }
    }

    public function show(Kredit $kredit)
    {
        //
    }


    public function edit(Kredit $kredit)
    {
        //
    }


    public function update(Request $request, Kredit $kredit)
    {
        //
    }


    public function destroy(Kredit $kredit)
    {
        //
    }
}
