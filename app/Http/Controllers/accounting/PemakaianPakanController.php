<?php

namespace App\Http\Controllers\accounting;

use App\Models\Sapi;
use App\Models\User;
use App\Models\StokPakan;
use Illuminate\Http\Request;
use App\Models\PemakaianPakan;
use App\Http\Controllers\Controller;
use App\Models\DetailPemakaianPakan;
use App\Models\MarkupSapi;

class PemakaianPakanController extends Controller
{

    public function index()
    {
        $pageData = [
            'title' => "Pemakaian pakan",
            'heading' => "Pemakaian pakan",
            'active' => "operasional kandang",
            'listPemakaianPakan' => PemakaianPakan::all(),
        ];
        return view('accounting.pemakaian_pakan.index', $pageData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageData = [
            'title' => "Pemakaian pakan",
            'heading' => "Pemakaian pakan baru",
            'active' => "operasional kandang",
            'listPemakaianPakan' => PemakaianPakan::all(),
            'listStokPakan' => StokPakan::all(),
            'listSapi' => Sapi::getSapiTersedia(),
            'listPekerja' => User::getPekerja(),
        ];
        return view('accounting.pemakaian_pakan.create', $pageData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;

        $pemakaianPakan = [
            "id_author" => auth()->user()->id,
            "id_pekerja" => $request->id_pekerja,
            "total_pengeluaran" => $request->total_pengeluaran,
            "keterangan" => $request->keterangan,
        ];

        PemakaianPakan::insert($pemakaianPakan);
        $idPemakaianPakanTerakhir = PemakaianPakan::getIdTerakhir();

        $listIdStokPakanDipakai = $request->stok_dipilih;

        for ($i = 0; $i < sizeof($listIdStokPakanDipakai); $i++) {
            $detailPemakaianPakan = [
                "id_pemakaian_pakan" => $idPemakaianPakanTerakhir,
                "id_stok_pakan" => $listIdStokPakanDipakai[$i],
                "subtotal" =>  $request->subtotal_pakan[$i],
                "qty" => $request->qty_pakan[$i],
                // "keterangan" => $request->keterangan,
            ];

            DetailPemakaianPakan::insert($detailPemakaianPakan);
        }

        $listIdSapiDipakan = $request->sapi_terpilih;
        for ($i = 0; $i < sizeof($listIdSapiDipakan); $i++) {
            $markupSapi = [
                "id_pemakaian_pakan" => $idPemakaianPakanTerakhir,
                "id_sapi" => $listIdSapiDipakan[$i],
                "markup" => $request->markup,
                "markup_pembulatan" => $request->markup_bulat,
            ];

            MarkupSapi::insert($markupSapi);
        }

        return redirect('/acc/pemakaian_pakan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PemakaianPakan  $pemakaianPakan
     * @return \Illuminate\Http\Response
     */
    public function show(PemakaianPakan $pemakaianPakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PemakaianPakan  $pemakaianPakan
     * @return \Illuminate\Http\Response
     */
    public function edit(PemakaianPakan $pemakaianPakan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PemakaianPakan  $pemakaianPakan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PemakaianPakan $pemakaianPakan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PemakaianPakan  $pemakaianPakan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PemakaianPakan $pemakaianPakan)
    {
        //
    }
}
