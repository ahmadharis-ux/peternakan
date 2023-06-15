<?php

namespace App\Http\Controllers\accounting;

use App\Http\Controllers\Controller;
use App\Models\DetailPembelianPakan;
use App\Models\Kas;
use App\Models\Kredit;
use App\Models\OperasionalPembelianPakan;
use App\Models\Pakan;
use App\Models\PembelianPakan;
use App\Models\Rekening;
use App\Models\SatuanPakan;
use App\Models\StokPakan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;

class PakanController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idJurnalPakan = 3;
        $pageData = [
            'title' => 'Buku - Pakan',
            'heading' => 'Buku - Pakan',
            'active' => 'buku',
            'ListSatuan' => SatuanPakan::all(),
            'ListPakan' => Pakan::all(),
            'ListStokPakan' => StokPakan::all(),
            'ListSupplierPakan' => User::getSupplierPakan(),
            'listKreditPakan' => Kredit::where('id_jurnal', $idJurnalPakan)->get(),
        ];
        return view('accounting.pakan.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = [
            'nama' => $request->nama,
            "created_at" => Carbon::now(),
            'id_author' => auth()->user()->id,
        ];
        Pakan::insert($validasi);
        return redirect()->back();
    }
    public function storeSatuan(Request $request)
    {
        $validasi = [
            'nama' => $request->nama,
            // 'id_author' => auth()->user()->id,
        ];
        SatuanPakan::insert($validasi);
        return redirect()->back();
    }
    function storePembelianPakan(Request $request)
    {
        $idJurnalPakan = 3;
        $today = carbonNow();

        Kas::kreditBaru();
        $dataKreditBaru = [
            "id_kas" => Kas::idTerakhir(),
            "id_author" => auth()->user()->id,
            "id_pihak_kedua" => $request->id_pihak_kedua,
            "id_jurnal" => $idJurnalPakan,
            "keterangan" => $request->keterangan,
            "created_at" => $today,
        ];

        Kredit::insert($dataKreditBaru);

        $dataPembelianPakanBaru = [
            "id_author" => auth()->user()->id,
            "id_kredit" => Kredit::idTerakhir(),
            "created_at" => $today,
        ];

        PembelianPakan::insert($dataPembelianPakanBaru);
        return redirect()->back();;
    }
    function storeDetailPembelianPakan(Request $request)
    {
        $idpembelianPakan = $request->id_pembelian_pakan;
        $idpakan = $request->id_pakan;
        $id_satuan_pakan = $request->id_satuan_pakan;
        $harga_satuan = $request->harga;
        $qty = $request->qty;
        $keterangan = $request->keterangan;
        $subtotal = $harga_satuan * $qty;

        $detailPembelianPakan = [
            "id_pembelian_pakan" => $idpembelianPakan,
            "id_pakan" => $idpakan,
            "id_satuan_pakan" => $id_satuan_pakan,
            "harga" => $harga_satuan,
            "qty" => $qty,
            "keterangan" => $keterangan,
            "subtotal" => $subtotal,
            "created_at" => carbonNow(),
        ];
        // dd($detailPembelianPakan);

        DetailPembelianPakan::insert($detailPembelianPakan);

        $idKredit = PembelianPakan::find($idpembelianPakan)->kredit->id;

        Kredit::tambahNominal($idKredit, $subtotal);
        Kredit::updateStatusLunas($idKredit);

        $stokpakan = [
            "id_pakan" => $idpakan,
            "id_satuan_pakan" => $id_satuan_pakan,
            "harga" => $harga_satuan,
            "stok" => $qty,
        ];

        StokPakan::insert($stokpakan);

        return redirect()->back();
    }

    public function showDetail($id)
    {
        $kredit = Kredit::find($id);
        $pembelianPakan = $kredit->pembelianPakan;
        $listDetailPembelian = $pembelianPakan->detailPembelianPakan;
        $pembelianPakan = $kredit->pembelianPakan;
        $listOperasionalPembelian = $pembelianPakan->operasionalPembelianPakan;
        $listRiwayatTransaksi = $kredit->transaksiKredit;
        $data = [
            'title' => 'Buku - Pakan',
            'heading' => 'Buku - Pakan',
            'active' => 'buku',
            'kredit' => $kredit,
            'ListPakan' => Pakan::all(),
            'pembelianPakan' => $pembelianPakan,
            'listDetailPembelian' => $listDetailPembelian,
            'ListSatuan' => SatuanPakan::all(),
            'listOperasionalPembelian' => $listOperasionalPembelian,
            'listRekening' => Rekening::all(),
            'listRiwayatTransaksi' => $listRiwayatTransaksi,
        ];
        return view('accounting.pakan.detail', $data);
    }

    public function storeOperasional(Request $request)
    {
        $idPembelianPakan = $request->id_pembelian_pakan;
        $hargaOperasional = $request->harga;

        $operasionalPembelianPakanBaru = [
            'id_pembelian_pakan' => $idPembelianPakan,
            'harga' => $hargaOperasional,
            'keterangan' => $request->keterangan,
            'created_at' => carbonNow(),
        ];

        OperasionalPembelianPakan::insert($operasionalPembelianPakanBaru);

        $idKredit = PembelianPakan::find($idPembelianPakan)->kredit->id;

        Kredit::tambahNominal($idKredit, $hargaOperasional);
        Kredit::updateStatusLunas($idKredit);

        return redirect()->back();
    }

    public function invoice(PembelianPakan $pembelianPakan, Request $request)
    {
        $kredit = $pembelianPakan->kredit()->first();
        $pageData = [
            "title" => "Invoice pembelian pakan $pembelianPakan->id",
            "pembelianPakan" => $pembelianPakan,
            "kredit" => $kredit,
            "subjek" => $request->subjek,
            "author" => auth()->user(),
            "jatuhTempo" => str_replace('-', '/', $request->jatuh_tempo),
        ];

        // return $pageData;

        return view('accounting.pakan.faktur', $pageData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pakan  $pakan
     * @return \Illuminate\Http\Response
     */
    public function show(Pakan $pakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pakan  $pakan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pakan $pakan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pakan  $pakan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pakan $pakan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pakan  $pakan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pakan $pakan)
    {
        //
    }
}
