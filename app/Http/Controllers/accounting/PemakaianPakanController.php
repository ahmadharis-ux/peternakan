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
use Carbon\Carbon;

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
        // dd($pageData);
        return view('accounting.pemakaian_pakan.index', $pageData);
    }

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

    public function store(Request $request)
    {
        $today = carbonNow();

        $pemakaianPakan = [
            "id_author" => auth()->user()->id,
            "id_pekerja" => $request->id_pekerja,
            "total_pengeluaran" => $request->total_pengeluaran,
            "keterangan" => $request->keterangan,
            "created_at" => $today,
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

    public function show(PemakaianPakan $pemakaianPakan)
    {
        //
    }


    public function edit(PemakaianPakan $pemakaianPakan)
    {
        //
    }


    public function update(Request $request, PemakaianPakan $pemakaianPakan)
    {
        //
    }

    public function destroy(PemakaianPakan $pemakaianPakan)
    {
        //
    }
}
