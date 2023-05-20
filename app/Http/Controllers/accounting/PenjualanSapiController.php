<?php

namespace App\Http\Controllers\accounting;

use App\Http\Controllers\Controller;
use App\Models\Debit;
use App\Models\DetailPenjualanSapi;
use App\Models\JenisSapi;
use App\Models\PenjualanSapi;
use App\Models\Rekening;
use App\Models\Sapi;
use App\Models\User;
use Illuminate\Http\Request;

class PenjualanSapiController extends Controller
{
    public function index()
    {
        $id_jurnal_piutang = 2;

        $pageData = [
            'title' => "Buku - Piutang",
            'heading' => "Buku - Piutang",
            'active' => "buku",
            'listDebitSapi' => Debit::where('id_jurnal', $id_jurnal_piutang)->get(),
            'listCustomer' => User::getCustomer(),
        ];

        return view('accounting.penjualan_sapi.index', $pageData);
    }


    public function store(Request $request)
    {
        $id_jurnal_piutang = 2;

        $dataDebitBaru = [
            "id_author" => auth()->user()->id,
            "id_pihak_kedua" => $request->id_pihak_kedua,
            "id_jurnal" => $id_jurnal_piutang,
            "keterangan" => $request->keterangan,
            "created_at" => carbonToday(),
        ];

        Debit::insert($dataDebitBaru);



        $idDebitTerbaru = Debit::latest()->limit(1)->get()[0]->id;
        $dataPenjualanSapiBaru = [
            "id_author" => auth()->user()->id,
            "id_debit" => $idDebitTerbaru,
            "created_at" => carbonToday(),
        ];
        PenjualanSapi::insert($dataPenjualanSapiBaru);

        return redirect('/acc/piutang');
    }

    public function storeDetail(Request $request)
    {
        $kiloan = $request->opsi_beli == 'kiloan';

        $detailPenjualanSapi = [
            "id_penjualan_sapi" => $request->id_penjualan_sapi,
            "id_sapi" => $request->id_sapi,
            "bobot" => $request->bobot,
            "kiloan" => $kiloan,
            "harga" => $request->total_harga,
            // "kondisi" => $request->kondisi,
            "keterangan" => $request->keterangan,
            "created_at" => carbonToday(),
        ];

        DetailPenjualanSapi::insert($detailPenjualanSapi);
        return redirect()->back();
    }

    public function show($id)
    {
        $debit = Debit::find($id);
        $penjualanSapi = $debit->penjualanSapi;
        $listSapi = Sapi::all();
        $listDetailpenjualan = $penjualanSapi->detailpenjualanSapi;
        $listOperasionalpenjualan = $penjualanSapi->operasionalpenjualanSapi;
        $listRiwayatTransaksi = $debit->transaksiDebit;



        $pageData = [
            'title' => "Buku - Hutang",
            'heading' => "Hutang baru",
            'active' => "buku",
            'debit' => $debit,
            'penjualanSapi' => $penjualanSapi,
            'listDetailpenjualan' => $listDetailpenjualan,
            'listOperasionalpenjualan' => $listOperasionalpenjualan,
            'listRiwayatTransaksi' => $listRiwayatTransaksi,
            'listJenisSapi' => JenisSapi::all(),
            'listRekening' => Rekening::all(),
        ];

        return view('accounting.penjualan_sapi.detail', $pageData);
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
