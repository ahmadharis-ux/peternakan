<?php

namespace App\Http\Controllers\accounting;

use App\Models\Kas;
use App\Models\Sapi;
use App\Models\User;
use App\Models\Debit;
use App\Models\Faktur;
use App\Models\Rekening;
use Illuminate\Http\Request;
use App\Models\PenjualanSapi;
use App\Models\DetailPenjualanSapi;
use App\Http\Controllers\Controller;
use App\Providers\PdfServiceProvider;
use Illuminate\Support\Facades\Storage;
use App\Models\OperasionalPenjualanSapi;

class PenjualanSapiController extends Controller
{
    public function index()
    {
        $id_jurnal_piutang = 2;
        $listDebitSapi = Debit::where('id_jurnal', $id_jurnal_piutang)
            ->where('id_author', auth()->user()->id)
            ->get();


        $pageData = [
            'title' => "Buku - Piutang",
            'heading' => "Buku - Piutang",
            'active' => "buku",
            'listDebitSapi' => $listDebitSapi,
            'listCustomer' => User::getCustomer(),
        ];

        return view('accounting.penjualan_sapi.index', $pageData);
    }


    public function store(Request $request)
    {
        $id_jurnal_piutang = 2;
        $today = carbonNow();

        Kas::debitBaru();

        $dataDebitBaru = [
            "id_kas" => Kas::idTerakhir(),
            "id_author" => auth()->user()->id,
            "id_pihak_kedua" => $request->id_pihak_kedua,
            "id_jurnal" => $id_jurnal_piutang,
            "keterangan" => $request->keterangan,
            "created_at" => $today,
        ];
        Debit::insert($dataDebitBaru);

        $dataPenjualanSapiBaru = [
            "id_author" => auth()->user()->id,
            "id_debit" => Debit::idTerakhir(),
            "created_at" => $today,
        ];
        PenjualanSapi::insert($dataPenjualanSapiBaru);

        return redirect('/acc/piutang');
    }

    public function storeDetail(Request $request)
    {
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
            "created_at" => carbonNow(),
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
            'created_at' => carbonNow(),
        ];

        OperasionalPenjualanSapi::insert($operasionalPenjualanSapiBaru);

        $idDebit = PenjualanSapi::find($idPenjualanSapi)->debit->id;

        Debit::tambahNominal($idDebit, $hargaOperasional);
        Debit::updateStatusLunas($idDebit);

        return redirect()->back();
    }


    public function show($id)
    {

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

    public function invoice(PenjualanSapi $penjualanSapi, Request $request)
    {
        $debit = $penjualanSapi->debit()->first();
        $nomorFaktur = "INV_" . getTimestamp();

        $pageData = [
            "title" => "Invoice penjualan sapi $penjualanSapi->id",
            "penjualanSapi" => $penjualanSapi,
            "debit" => $debit,
            "subjek" => $request->subjek,
            "author" => auth()->user(),
            "nomorFaktur" => $nomorFaktur,
            "jatuhTempo" => str_replace('-', '/', $request->jatuh_tempo),
            "tanggalCetak" => tanggalSekarang(),
        ];

        $fakturBaru = [
            "nomor_faktur" => $nomorFaktur,
            "subjek" => $request->subjek,
            "id_debit" => $request->id_debit,
            "id_author" => auth()->user()->id,
            "id_pihak_kedua" => $debit->id_pihak_kedua,
            "page_data" => json_encode($pageData),

        ];

        if (!Faktur::create($fakturBaru)) {
            return back('/')->with('error', 'Gagal cetak faktur');
        }

        return view('accounting.penjualan_sapi.faktur', $pageData);
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
