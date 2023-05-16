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


    // public function create()
    // {
    //     $listSupplierSapi = User::where('role_id', '5')->get();
    //     $listSupplierSapi = withFullname($listSupplierSapi);

    //     $pageData = [
    //         'title' => "Buku - Hutang",
    //         'heading' => "Hutang baru",
    //         'active' => "buku",
    //         'listSupplierSapi' => $listSupplierSapi,
    //     ];

    //     return view('accounting.pembelian_sapi.create', $pageData);
    // }


    public function store(Request $request)
    {
        $dataKreditBaru = [
            "id_author" => auth()->user()->id,
            "id_pihak_kedua" => $request->id_pihak_kedua,
            "id_jurnal" => 1, // id jurnal Hutang
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
        $detailPembelianSapiBaru = [
            "id_pembelian_sapi" => $request->id_pembelian_sapi,
            "id_jenis_sapi" => $request->id_jenis_sapi,
            "jenis_kelamin" => $request->jenis_kelamin,
            "eartag" => $request->eartag,
            "bobot" => $request->bobot,
            "kiloan" => $kiloan,
            "harga" => $request->total_harga,
            // "kondisi" => $request->kondisi,
            "keterangan" => $request->keterangan,
            "created_at" => carbonToday(),
        ];

        DetailPembelianSapi::insert($detailPembelianSapiBaru);
        return redirect()->back();
    }

    public function storeOperasional(Request $request)
    {
        $operasionalPembelianSapiBaru = [
            'id_pembelian_sapi' => $request->id_pembelian_sapi,
            'harga' => $request->harga,
            'keterangan' => $request->keterangan,
        ];

        OperasionalPembelianSapi::insert($operasionalPembelianSapiBaru);
        return redirect()->back();
    }

    public function show($id)
    {
        $idKredit = Kredit::find($id)->id;
        $pembelianSapi = PembelianSapi::where('id_kredit', $idKredit)->limit(1)->get()[0];

        $listDetailPembelian = DetailPembelianSapi::where('id_pembelian_sapi', $pembelianSapi->id)->get();
        $listOperasionalPembelian = OperasionalPembelianSapi::where('id_pembelian_sapi', $pembelianSapi->id)->get();

        $pageData = [
            'title' => "Buku - Hutang",
            'heading' => "Hutang baru",
            'active' => "buku",
            'pembelianSapi' => $pembelianSapi,
            'listJenisSapi' => JenisSapi::all(),
            'listDetailPembelian' => $listDetailPembelian,
            'listOperasionalPembelian' => $listOperasionalPembelian,
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
