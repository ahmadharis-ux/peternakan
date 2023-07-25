<?php

namespace App\Http\Controllers\accounting;

use Carbon\Carbon;
use App\Models\Kas;
use App\Models\User;
use App\Models\Kredit;
use App\Models\Rekening;
use Illuminate\Http\Request;
use App\Models\TransaksiKredit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class TabunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index()
    {
        $idJurnalTabungan = 5;

        $pageData = [
            'title' => 'Buku - Tabungan',
            'heading' => 'Buku - Tabungan',
            'active' => 'buku',
            'listTabungan' => Kredit::where('id_jurnal', $idJurnalTabungan)->get(),
            'listOwner' => User::getOwner(),
            'listRekening' => Rekening::all(),
        ];

        return view('accounting.tabungan.index', $pageData);
    }
    function store(Request $request)
    {



        DB::beginTransaction();
        try {
            $idJurnalTabungan = 5;
            Kas::kreditBaru();

            $dataKreditTabungan = [
                "id_kas" => Kas::idTerakhir(),
                "id_jurnal" => $idJurnalTabungan,
                "id_author" => auth()->user()->id,
                "id_pihak_kedua" => $request->id_pihak_kedua,
                "nominal" => $request->nominal,
                "keterangan" => $request->keterangan,
                "adm" => $request->adm,
                "lunas" => true,

            ];




            Kredit::create($dataKreditTabungan);
            $idRekening = $request->id_rekening;
            $nominalBayar = $request->nominal;
            $adm = $request->adm;

            Rekening::pengeluaran($idRekening, $nominalBayar + $adm);

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
            return redirect()->back()->with('success', "Tabungan tersimpan");
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            return redirect()->back()->with('error', "Gagal menyimpan tabungan");
        }
    }
}
