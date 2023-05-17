<?php

namespace App\Http\Controllers\accounting;

use App\Http\Controllers\Controller;
use App\Models\Kredit;
use App\Models\TransaksiKredit;
use App\Models\User;
use Illuminate\Http\Request;

class KreditController extends Controller
{

    public function index()
    {
        $listSupplierSapi = User::where('role_id', '5')->get();
        $listSupplierSapi = withFullname($listSupplierSapi);

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
        $idKredit = $request->id_kredit;
        $sisaKredit = Kredit::getSisaPembayaran($idKredit);
        $nominalBayar = $request->nominal;

        if ($nominalBayar > $sisaKredit) {
            return redirect()->back()->withErrors('Nominal pembayaran melebihi sisa kredit!');
        }

        $transaksiKredit = [
            "id_kredit" => $idKredit,
            "id_author" => auth()->user()->id,
            "id_rekening" => $request->id_rekening,
            "nominal" => $nominalBayar,
            "adm" => $request->adm,
            "created_at" => carbonToday(),
        ];

        TransaksiKredit::insert($transaksiKredit);

        Kredit::updateStatusLunas($idKredit);

        return redirect()->back();
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
