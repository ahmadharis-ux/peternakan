<?php

namespace App\Http\Controllers\accounting;

use App\Http\Controllers\Controller;
use App\Models\PenjualanSapi;
use Illuminate\Http\Request;

class PenjualanSapiController extends Controller
{
    public function index()
    {
        $pageData = [
            'title' => "Buku - Piutang",
            'heading' => "Buku - Piutang",
            'active' => "buku",
            'listPembelianSapi' => PenjualanSapi::all(),
        ];

        return view('accounting.penjualan_sapi.index', $pageData);
    }


    public function create()
    {
        $listCustomer = User::where('role_id', '6')->get();
        $listCustomer = withFullname($listCustomer);

        $pageData = [
            'title' => "Buku - Piutang",
            'heading' => "Piutang baru",
            'active' => "buku",
            'listCustomer' => $listCustomer,
        ];

        return view('accounting.penjualan_sapi.create', $pageData);
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
     * @param  \App\Models\PenjualanSapi  $penjualanSapi
     * @return \Illuminate\Http\Response
     */
    public function show(PenjualanSapi $penjualanSapi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenjualanSapi  $penjualanSapi
     * @return \Illuminate\Http\Response
     */
    public function edit(PenjualanSapi $penjualanSapi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenjualanSapi  $penjualanSapi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenjualanSapi $penjualanSapi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenjualanSapi  $penjualanSapi
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenjualanSapi $penjualanSapi)
    {
        //
    }
}
