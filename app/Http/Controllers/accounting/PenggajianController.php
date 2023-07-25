<?php

namespace App\Http\Controllers\accounting;

use App\Models\Kas;
use App\Models\User;
use App\Models\Kredit;
use App\Models\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\TransaksiKredit;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class PenggajianController extends Controller
{
    public function index()
    {
        $pageData = [
            'title' => "Buku - Gaji",
            'heading' => "Buku - Gaji",
            'active' => "buku",
            'listPekerja' => User::getPekerja(),
        ];

        return view('accounting.penggajian.index', $pageData);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {


        DB::beginTransaction();
        try {
            $idJurnalGaji = 4;

            Kas::kreditBaru();
            $dataKreditBaru = [
                "id_kas" => Kas::idTerakhir(),
                "id_author" => auth()->user()->id,
                "id_pihak_kedua" => $request->id_pihak_kedua,
                "id_jurnal" => $idJurnalGaji,
                "nominal" => $request->nominal,
                "keterangan" => $request->keterangan ?? 'gaji pekerja $pekerja->id',

            ];

            Kredit::create($dataKreditBaru);

            DB::commit();
            return redirect()->back()->with('success', "Penggajian tersimpan");
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            return redirect()->back()->with('error', "Gagal menyimpan penggajian");
        }
    }

    public function showPenggajianPekerja($id)
    {
        $idJurnalGaji = 4;

        $pekerja = User::find($id);

        $listKreditPenggajian = Kredit::where('id_pihak_kedua', $pekerja->id)
            ->where('id_jurnal', $idJurnalGaji);

        $penggajianBulanIni = $listKreditPenggajian
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)->get();


        $listKreditPenggajian = $listKreditPenggajian->get();

        $pageData = [
            'title' => "Buku - Gaji",
            'heading' => "Buku - Gaji",
            'active' => "buku",
            'pekerja' => $pekerja,
            'listKreditPenggajian' => $listKreditPenggajian,
            'penggajianBulanIni' => $penggajianBulanIni,
        ];


        return view('accounting.penggajian.indexPenggajianPekerja', $pageData);
    }

    public function show($id)
    {
        $kreditPenggajian = Kredit::find($id);
        $created = $kreditPenggajian->created_at;

        $tahun = substr($created, 0, 4);
        $bulan = substr($created, 5, 2);
        $waktuKredit = "Tahun $tahun, bulan $bulan";

        $pageData = [
            'title' => "Buku - Gaji",
            'heading' => "Buku - Gaji",
            'active' => "buku",
            'pekerja' => $kreditPenggajian->pihakKedua,
            'kreditPenggajian' => $kreditPenggajian,
            'listRiwayatTransaksi' => $kreditPenggajian->transaksiKredit,
            'listRekening' => Rekening::all(),
            'waktuKredit' => $waktuKredit,
        ];

        return view('accounting.penggajian.detail', $pageData);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
