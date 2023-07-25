<?php

namespace App\Http\Controllers\accounting;

use Carbon\Carbon;
use App\Models\Kas;
use App\Models\User;
use App\Models\Prive;
use App\Models\Kredit;
use App\Models\Rekening;
use Illuminate\Http\Request;
use App\Models\TransaksiKredit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

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

        // return Kredit::where('id_jurnal', 6)->get();

        return view('accounting.prive.index', $pageData);
    }
    function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $idJurnalPrive = 6;
            $nominalBayar = $request->nominal;
            $adm = $request->adm;
            $totalPengeluaran = $nominalBayar + $adm;

            Kas::kreditBaru();

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
            ];

            Kredit::create($dataKreditPrive);

            $idRekening = $request->id_rekening;
            Rekening::pengeluaran($idRekening, $totalPengeluaran);

            $dataTransaksiKredit = [
                "id_author" => auth()->user()->id,
                "id_kredit" => Kredit::idTerakhir(),
                "id_rekening" => $idRekening,
                "nominal" => $nominalBayar,
                "id_pihak_kedua" => $request->id_pihak_kedua,
                "keterangan" => $request->keterangan,
                "adm" => $adm,
                "current_saldo" => Rekening::getTotalSaldo(),
            ];

            TransaksiKredit::create($dataTransaksiKredit);
            DB::commit();
            return redirect()->back()->with('success', "Prive tersimpan");
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            return redirect()->back()->with('error', "Gagal menyimpan prive");
        }
    }
}
