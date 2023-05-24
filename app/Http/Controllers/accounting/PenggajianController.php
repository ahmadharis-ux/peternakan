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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $filterBulan = request('bulan');
        $filterTahun = request('tahun');
        // $filtered = $filterBulan || $filterTahun;

        $pekerja = User::find($id);
        $pekerja->fullname = "$pekerja->nama_depan $pekerja->nama_belakang";

        $idJurnalGaji = 4;

        $kreditPenggajian = Kredit::where('id_jurnal', $idJurnalGaji)->where('id_pihak_kedua', $pekerja->id);

        $kreditPenggajian = $kreditPenggajian
            ->whereMonth('created_at', $filterBulan ?? Carbon::now()->month)
            ->whereYear('created_at', $filterTahun ?? Carbon::now()->year)
            ->get();

        // if ($filtered) {

        // } else {
        //     $kreditPenggajian = $kreditPenggajian
        //         ->whereMonth('created_at', Carbon::now()->month)
        //         ->whereYear('created_at', Carbon::now()->year)
        //         ->get();
        // }


        if (sizeof($kreditPenggajian) > 0) {
            $kreditPenggajian = $kreditPenggajian[0];
        } else {
            $kreditPenggajian = null;
        }

        // $listRiwayatTransaksi = TransaksiKredit::where('id_kredit', $kreditPenggajian?->id)->get() ?? null;


        $pageData = [
            'title' => "Buku - Gaji - $pekerja->fullname",
            'heading' => "Buku - Gaji",
            'active' => "buku",
            'pekerja' => $pekerja,
            'kreditPenggajian' => $kreditPenggajian,
            'listRekening' => Rekening::all(),
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
