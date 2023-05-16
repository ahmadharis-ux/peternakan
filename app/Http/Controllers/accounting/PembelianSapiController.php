<?php

namespace App\Http\Controllers\accounting;

use App\Models\User;
use App\Models\Kredit;
use Illuminate\Http\Request;
use App\Models\PembelianSapi;
use App\Http\Controllers\Controller;
use App\Models\Jurnal;
use Illuminate\Support\Carbon;

class PembelianSapiController extends Controller
{
    public function index()
    {
        $listSupplierSapi = User::where('role_id', '5')->get();
        $listSupplierSapi = withFullname($listSupplierSapi);

        $id_jurnal = 1;

        $pageData = [
            'title' => "Buku - Hutang",
            'heading' => "Buku - Hutang",
            'active' => "buku",
            'listKreditSapi' => Kredit::where('id_jurnal', $id_jurnal)->get(),
            'listSupplierSapi' => $listSupplierSapi,
        ];


        return view('accounting.pembelian_sapi.index', $pageData);
    }


    public function create()
    {
        $listSupplierSapi = User::where('role_id', '5')->get();
        $listSupplierSapi = withFullname($listSupplierSapi);

        $pageData = [
            'title' => "Buku - Hutang",
            'heading' => "Hutang baru",
            'active' => "buku",
            'listSupplierSapi' => $listSupplierSapi,
        ];

        return view('accounting.pembelian_sapi.create', $pageData);
    }


    public function store(Request $request)
    {
        $dataKreditBaru = [
            "id_author" => auth()->user()->id,
            "id_pihak_kedua" => $request->id_pihak_kedua,
            "id_jurnal" => 1, // id jurnal Hutang
            "keterangan" => $request->keterangan,
            "created_at" => carbonToday(),
        ];

        $insertBerhasil = Kredit::insert($dataKreditBaru);

        if (!$insertBerhasil) {
            return redirect('/acc/hutang')->withErrors('insert kredit gagal');
        }

        $idKreditTerbaru = Kredit::latest()->limit(1)->get()[0]->id;

        $dataPembelianSapiBaru = [
            "id_author" => auth()->user()->id,
            "id_kredit" => $idKreditTerbaru,
            "created_at" => carbonToday(),
        ];

        return redirect('/acc/hutang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PembelianSapi  $pembelianSapi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kredit = Kredit::find($id);
        return $kredit;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PembelianSapi  $pembelianSapi
     * @return \Illuminate\Http\Response
     */
    public function edit(PembelianSapi $pembelianSapi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PembelianSapi  $pembelianSapi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PembelianSapi $pembelianSapi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PembelianSapi  $pembelianSapi
     * @return \Illuminate\Http\Response
     */
    public function destroy(PembelianSapi $pembelianSapi)
    {
        //
    }
}
