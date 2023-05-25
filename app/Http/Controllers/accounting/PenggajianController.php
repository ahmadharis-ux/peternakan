<?php

namespace App\Http\Controllers\accounting;

use App\Models\Kas;
use App\Models\User;
use App\Models\Kredit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Rekening;
use App\Models\TransaksiKredit;

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
        $idJurnalGaji = 4;

        Kas::kreditBaru();
        $dataKreditBaru = [
            "id_kas" => Kas::idTerakhir(),
            "id_author" => auth()->user()->id,
            "id_pihak_kedua" => $request->id_pekerja,
            "id_jurnal" => $idJurnalGaji,
            "nominal" => $request->nominal_gaji,
            "keterangan" => $request->keterangan ?? 'gaji pekerja $pekerja->id',
            "created_at" => carbonToday(),
        ];

        Kredit::insert($dataKreditBaru);
        return redirect()->back();;
    }

    public function showPenggajianPekerja($id)
    {
        $idJurnalGaji = 4;

        $pekerja = User::find($id);
        $pekerja->fullname = "$pekerja->nama_depan $pekerja->nama_belakang";

        $listKreditPenggajian = Kredit::where('id_pihak_kedua',         $pekerja->id)
            ->where('id_jurnal', $idJurnalGaji);

        $penggajianBulanIni = $listKreditPenggajian
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)->get();


        $pageData = [
            'title' => "Buku - Gaji",
            'heading' => "Buku - Gaji",
            'active' => "buku",
            'pekerja' => $pekerja,
            'listKreditPenggajian' => $listKreditPenggajian->get(),
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
