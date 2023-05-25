<?php

namespace App\Http\Controllers\accounting;

use App\Http\Controllers\Controller;
use App\Models\Kas;
use App\Models\Kredit;
use App\Models\Prive;
use App\Models\Rekening;
use App\Models\TransaksiKredit;
use App\Models\User;
use Illuminate\Http\Request;

class PriveController extends Controller
{
    function index()
    {
        $pageData = [
            'title' => 'Buku - Prive',
            'heading' => 'Buku - Prive',
            'active' => 'buku',
            'listPrive' => Kredit::where('id_jurnal', 6)->get(),
            'listOwner' => User::getOwner(),
            'listRekening' => Rekening::all(),
        ];

        return view('accounting.prive.index', $pageData);
    }
    function store(Request $request)
    {
        $idJurnalPrive = 6;
        Kas::kreditBaru();
        $today = carbonToday();

        $dataKreditPrive = [
            "id_kas" => Kas::idTerakhir(),
            "id_jurnal" => $idJurnalPrive,
            "id_author" => auth()->user()->id,
            "id_pihak_kedua" => $request->id_pihak_kedua,
            "nominal" => $request->nominal,
            "keterangan" => $request->keterangan,
            "adm" => $request->adm,
            "tenggat" => $request->tenggat,
            "lunas" => true,
            "created_at" => $today,
        ];

        Kredit::insert($dataKreditPrive);
        $idRekening = $request->id_rekening;
        $nominalBayar = $request->nominal;
        $adm = $request->adm;
        $dataTransaksiKredit = [
            "id_author" => auth()->user()->id,
            "id_kredit" => Kredit::idTerakhir(),
            "id_rekening" => $idRekening,
            "nominal" => $nominalBayar,
            "keterangan" => $request->keterangan,
            "adm" => $adm,
            "created_at" => $today,
        ];
        TransaksiKredit::insert($dataTransaksiKredit);
        Rekening::pengeluaran($idRekening, $nominalBayar + $adm);
        return redirect()->back();
    }
}
