<?php

namespace App\Http\Controllers\accounting;

use App\Models\User;
use App\Models\Kredit;
use Illuminate\Http\Request;
use App\Models\PembelianSapi;
use App\Http\Controllers\Controller;
use App\Models\DetailPembelianSapi;
use App\Models\JenisSapi;
use App\Models\Jurnal;
use App\Models\OperasionalPembelianSapi;
use App\Models\Rekening;
use App\Models\TransaksiKredit;
use Illuminate\Support\Carbon;

class PembelianSapiController extends Controller
{
    public function index()
    {
        $idJurnalHutang = 1;

        $pageData = [
            'title' => "Buku - Hutang",
            'heading' => "Buku - Hutang",
            'active' => "buku",
            'listKreditSapi' => Kredit::where('id_jurnal', $idJurnalHutang)->get(),
            'listSupplierSapi' => User::getSupplierSapi(),
        ];


        return view('accounting.pembelian_sapi.index', $pageData);
    }

    public function store(Request $request)
    {
        $idJurnalHutang = 1;

        $dataKreditBaru = [
            "id_author" => auth()->user()->id,
            "id_pihak_kedua" => $request->id_pihak_kedua,
            "id_jurnal" => $idJurnalHutang,
            "keterangan" => $request->keterangan,
            "created_at" => carbonToday(),
        ];

        Kredit::insert($dataKreditBaru);

        $idKreditTerbaru = Kredit::latest()->limit(1)->get()[0]->id;
        $dataPembelianSapiBaru = [
            "id_author" => auth()->user()->id,
            "id_kredit" => $idKreditTerbaru,
            "created_at" => carbonToday(),
        ];

        PembelianSapi::insert($dataPembelianSapiBaru);
        return redirect()->back();;
    }

    public function storeDetail(Request $request)
    {
        $kiloan = $request->opsi_beli == 'kiloan';
        $idPembelianSapi = $request->id_pembelian_sapi;
        $hargaSapi = $request->total_harga;

        $detailPembelianSapiBaru = [
            "id_pembelian_sapi" => $idPembelianSapi,
            "id_jenis_sapi" => $request->id_jenis_sapi,
            "jenis_kelamin" => $request->jenis_kelamin,
            "eartag" => $request->eartag,
            "bobot" => $request->bobot,
            "kiloan" => $kiloan,
            "harga" => $hargaSapi,
            // "kondisi" => $request->kondisi,
            "keterangan" => $request->keterangan,
            "created_at" => carbonToday(),
        ];

        DetailPembelianSapi::insert($detailPembelianSapiBaru);

        $idKredit = PembelianSapi::find($idPembelianSapi)->kredit->id;

        Kredit::tambahNominal($idKredit, $hargaSapi);
        Kredit::updateStatusLunas($idKredit);


        return redirect()->back();
    }

    public function storeOperasional(Request $request)
    {
        $idPembelianSapi = $request->id_pembelian_sapi;
        $hargaOperasional = $request->harga;

        $operasionalPembelianSapiBaru = [
            'id_pembelian_sapi' => $idPembelianSapi,
            'harga' => $hargaOperasional,
            'keterangan' => $request->keterangan,
            'created_at' => carbonToday(),
        ];

        OperasionalPembelianSapi::insert($operasionalPembelianSapiBaru);

        $idKredit = PembelianSapi::find($idPembelianSapi)->kredit->id;

        Kredit::tambahNominal($idKredit, $hargaOperasional);
        Kredit::updateStatusLunas($idKredit);

        return redirect()->back();
    }

    public function show($id)
    {
        $kredit = Kredit::find($id);
        return $kredit;
        $pembelianSapi = $kredit->pembelianSapi;
        $listDetailPembelian = $pembelianSapi->detailPembelianSapi;
        $listOperasionalPembelian = $pembelianSapi->operasionalPembelianSapi;
        $listRiwayatTransaksi = $kredit->transaksiKredit;

        $pageData = [
            'title' => "Buku - Hutang",
            'heading' => "Hutang baru",
            'active' => "buku",
            'kredit' => $kredit,
            'pembelianSapi' => $pembelianSapi,
            'listDetailPembelian' => $listDetailPembelian,
            'listOperasionalPembelian' => $listOperasionalPembelian,
            'listRiwayatTransaksi' => $listRiwayatTransaksi,
            'listJenisSapi' => JenisSapi::all(),
            'listRekening' => Rekening::all(),
        ];

        return view('accounting.pembelian_sapi.detail', $pageData);
    }


    public function edit(PembelianSapi $pembelianSapi)
    {
        //
    }


    public function update(Request $request, PembelianSapi $pembelianSapi)
    {
        //
    }


    public function destroy(PembelianSapi $pembelianSapi)
    {
        //
    }
}
