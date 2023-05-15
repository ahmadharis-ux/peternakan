<?php

namespace App\Http\Controllers\accounting;

use App\Models\User;
use App\Models\Kredit;
use Illuminate\Http\Request;
use App\Models\PembelianSapi;
use App\Http\Controllers\Controller;

class PembelianSapiController extends Controller
{
    public function index()
    {
        // $listSupplierSapi = User::where('role_id', '5')->get();
        // $listSupplierSapi = withFullname($listSupplierSapi);

        $pageData = [
            'title' => "Buku - Hutang",
            'heading' => "Buku - Hutang",
            'active' => "buku",
            'listPembelianSapi' => PembelianSapi::all(),
            // 'listSupplierSapi' => $listSupplierSapi,
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PembelianSapi  $pembelianSapi
     * @return \Illuminate\Http\Response
     */
    public function show(PembelianSapi $pembelianSapi)
    {
        //
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
