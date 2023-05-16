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

        $transaksiKredit = [
            "id_kredit" => $request->id_kredit,
            "id_author" => auth()->user()->id,
            "id_rekening" => $request->id_rekening,
            "nominal" => $request->nominal,
            "adm" => $request->adm,
        ];

        TransaksiKredit::insert($transaksiKredit);
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
