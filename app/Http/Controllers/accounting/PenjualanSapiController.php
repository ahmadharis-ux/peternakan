<?php

namespace App\Http\Controllers\accounting;

use App\Http\Controllers\Controller;
use App\Models\Debit;
use App\Models\JenisSapi;
use App\Models\PenjualanSapi;
use App\Models\User;
use Illuminate\Http\Request;

class PenjualanSapiController extends Controller
{
    public function index()
    {
        $listCustomer = User::where('role_id', '6')->get();
        $listCustomer = withFullname($listCustomer);
        $id_jurnal = 2;


        $pageData = [
            'title' => "Buku - Piutang",
            'heading' => "Buku - Piutang",
            'active' => "buku",
            'listPenjualanSapi' => PenjualanSapi::all(),
            'listDebitSapi' => Debit::where('id_jurnal', $id_jurnal)->get(),
            'listCustomer' => $listCustomer,

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

        return view('accounting.penjualan_sapi.index', $pageData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataKreditBaru = [
            "id_author" => auth()->user()->id,
            "id_pihak_kedua" => $request->id_pihak_kedua,
            "id_jurnal" => 2, // id jurnal Hutang
            "keterangan" => $request->keterangan,
            "created_at" => carbonToday(),
        ];

        $insertBerhasil = Debit::insert($dataKreditBaru);

        if (!$insertBerhasil) {
            return redirect('/acc/piutang')->withErrors('insert debit gagal');
        }

        $idDebitTerbaru = Debit::latest()->limit(1)->get()[0]->id;

        $dataPenjuaalanSapiBaru = [
            "id_author" => auth()->user()->id,
            "id_debit" => $idDebitTerbaru,
            "created_at" => carbonToday(),
        ];

        return redirect('/acc/piutang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenjualanSapi  $penjualanSapi
     * @return \Illuminate\Http\Response
     */
    public function show(PenjualanSapi $penjualanSapi, $id)
    {
        $debit = Debit::find($id);
        $pageData = [
            'title' => "Buku - Piutang",
            'heading' => "Piutang baru",
            'active' => "buku",
            'listJenisSapi' => JenisSapi::all()

        ];

        return view('accounting.pembelian_sapi.detail', $pageData);
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
