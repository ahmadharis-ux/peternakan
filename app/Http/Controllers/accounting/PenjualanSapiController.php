<?php

namespace App\Http\Controllers\accounting;

use App\Http\Controllers\Controller;
use App\Models\Debit;
use App\Models\DetailPenjualanSapi;
use App\Models\OperasionalPenjualanSapi;
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
        // return $request;
        $idPenjualanSapi = $request->id_penjualan_sapi;
        $kiloan = $request->opsi_beli == 'kiloan';
        $idSapi = $request->id_sapi;
        $hargaSapi = $request->total_harga;

        $detailPenjualanSapi = [
            "id_penjualan_sapi" => $request->id_penjualan_sapi,
            "id_sapi" => $idSapi,
            // "eartag" => $request->eartag,
            "bobot" => $request->bobot,
            "kiloan" => $kiloan,
            "harga" => $hargaSapi,
            // "kondisi" => $request->kondisi,
            "keterangan" => $request->keterangan,
            "created_at" => carbonToday(),
        ];

        DetailPenjualanSapi::insert($detailPenjualanSapi);
        $idDebit = PenjualanSapi::find($idPenjualanSapi)->debit->id;


        Debit::tambahNominal($idDebit, $hargaSapi);
        Debit::updateStatusLunas($idDebit);
        Sapi::terjual($idSapi);

        return redirect()->back();
    }

    public function storeOperasional(Request $request)
    {
        $idPenjualanSapi = $request->id_penjualan_sapi;
        $hargaOperasional = $request->harga;

        $operasionalPenjualanSapiBaru = [
            'id_penjualan_sapi' => $idPenjualanSapi,
            'harga' => $hargaOperasional,
            'keterangan' => $request->keterangan,
            'created_at' => carbonToday(),
        ];

        OperasionalPenjualanSapi::insert($operasionalPenjualanSapiBaru);

        $idDebit = PenjualanSapi::find($idPenjualanSapi)->debit->id;

        Debit::tambahNominal($idDebit, $hargaOperasional);
        Debit::updateStatusLunas($idDebit);

        return redirect()->back();
    }


    public function show($id)
    {
        // return Debit::getSisaPembayaran(1);

        $debit = Debit::find($id);
        $penjualanSapi = $debit->penjualanSapi;
        $listDetailPenjualan = $penjualanSapi->detailPenjualanSapi;
        $listOperasionalPenjualan = $penjualanSapi->operasionalpenjualanSapi;
        $listRiwayatTransaksi = $debit->transaksiDebit;


        $pageData = [
            'title' => "Buku - Piutang",
            'heading' => "Piutang baru",
            'active' => "buku",
            'debit' => $debit,
            'penjualanSapi' => $penjualanSapi,
            'listSapi' => Sapi::where('status', 'ADA')->get(),
            'listDetailPenjualan' => $listDetailPenjualan,
            'listOperasionalPenjualan' => $listOperasionalPenjualan,
            'listRiwayatTransaksi' => $listRiwayatTransaksi,
            'listRekening' => Rekening::all(),
        ];

        return view('accounting.penjualan_sapi.detail', $pageData);
    }


    public function edit(PenjualanSapi $penjualanSapi)
    {
        //
    }

    public function update(Request $request, PenjualanSapi $penjualanSapi)
    {
        //
    }


    public function destroy(PenjualanSapi $penjualanSapi)
    {
        //
    }
}
