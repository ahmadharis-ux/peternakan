<?php

namespace App\Http\Controllers\accounting;

use App\Http\Controllers\Controller;
use App\Models\DetailPembelianPakan;
use App\Models\Kas;
use App\Models\Kredit;
use App\Models\Pakan;
use App\Models\PembelianPakan;
use App\Models\SatuanPakan;
use App\Models\User;
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
        $validasi= [
            'nama' => $request->nama,
            'id_author' => auth()->user()->id, 
        ];
        Pakan::insert($validasi);
        return redirect()->back();
    }
    public function storeSatuan(Request $request)
    {
        $validasi= [
            'nama' => $request->nama,
            // 'id_author' => auth()->user()->id, 
        ];
        SatuanPakan::insert($validasi);
        return redirect()->back();
    }
    function storePembelianPakan(Request $request){
        $idJurnalPakan = 3;
        $today = carbonToday();

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
        $idpakan = $request->id_pakan;
        $id_satuan_pakan = $request->id_satuan_pakan;
        $harga_satuan = $request->harga;
        $qty = $request->qty;
        $keterangan = $request->keterangan;
        $subtotal = $harga_satuan * $qty;

        $detailPembelianPakan = [
            // "id_pembelian_pakan" => $id_pembelian_pakan,
            "id_pakan" => $idpakan,
            "id_satuan_pakan" => $id_satuan_pakan,
            "harga" => $harga_satuan,
            "qty" => $qty,
            "keterangan" => $keterangan,
            "subtotal" => $subtotal,
            "created_at" => carbonToday(),
        ];
        dd($detailPembelianPakan);

        // DetailPembelianPakan::insert($detailPembelianPakan);

        // $idKredit = PembelianPakan::find($idPembelianSapi)->kredit->id;

        // Kredit::tambahNominal($idKredit, $hargaSapi);
        // Kredit::updateStatusLunas($idKredit);

        // $pakan = [
        //     "id_jenis_sapi" => $idJenisSapi,
        //     "eartag" => $eartag,
        //     "harga_pokok" => $hargaSapi,
        //     "bobot" => $bobot,
        //     "jenis_kelamin" => $jenisKelamin,
        // ];

        // Sapi::insert($sapi);

        return redirect()->back();
    }
    public function showDetail($id)
    {
        $data = [
            'title' => 'Buku - Pakan',
            'heading' => 'Buku - Pakan',
            'active' => 'buku',
            'ListPakan' => Pakan::all(),
            'ListSatuan' => SatuanPakan::all()
        ];
        return view('accounting.pakan.detail', $data);
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
