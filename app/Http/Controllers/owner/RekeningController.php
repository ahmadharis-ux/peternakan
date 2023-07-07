<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use App\Models\Rekening;
use Illuminate\Http\Request;

class RekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index()
    {
        $pageData = [
            'title' => "Rekening",
            'heading' => "Opsi - Rekening",
            'active' => "opsi",
            'listRekening' => Rekening::all(),
        ];

        return view('owner.rekening.index', $pageData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nomor_rekening" => "required",
            "atas_nama" => "required",
            "bank" => "required",
            "saldo_awal" => "required"
        ]);

        $rekening = new Rekening();
        $rekening->id_author = myId();
        $rekening->nomor_rekening = $request->nomor_rekening;
        $rekening->atas_nama = $request->atas_nama;
        $rekening->bank = $request->bank;
        $rekening->saldo = $request->saldo_awal;
        $rekening->save();

        return redirect('/owner/rekening')->with('success', 'Rekening baru berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function show(Rekening $rekening)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function edit(Rekening $rekening)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rekening $rekening)
    {
        $rekening->nomor_rekening = $request->nomor_rekening;
        $rekening->atas_nama = $request->atas_nama;
        $rekening->bank = $request->bank;
        $rekening->save();

        return redirect('/owner/rekening')->with('success', 'Rekening berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rekening  $rekening
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekening $rekening)
    {
        return $rekening;

        return redirect('/owner/rekening')->with('success', 'Rekening berhasil dihapus!');
    }
}
