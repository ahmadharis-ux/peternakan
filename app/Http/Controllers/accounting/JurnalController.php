<?php

namespace App\Http\Controllers\accounting;

use App\Http\Controllers\Controller;
use App\Models\Jurnal;
use App\Models\KodeJurnal;
use Illuminate\Http\Request;

class JurnalController extends Controller
{

    public function index()
    {
        $pageData = [
            'title' => "Jurnal",
            'heading' => "Jurnal",
            'active' => "opsi",
            'listJurnal' => Jurnal::orderBy('created_at', 'DESC')->get(),
            'listKodeJurnal' => KodeJurnal::all(),
        ];

        return view('accounting.jurnal.index', $pageData);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $dataJurnalBaru = [
            'nama' => $request->nama_jurnal,
            'id_kode_jurnal' => $request->id_kode_jurnal,
            'id_author' => auth()->user()->id
        ];


        Jurnal::insert($dataJurnalBaru);
        return redirect()->back();
    }


    public function show($idJurnal)
    {
        $jurnal = Jurnal::find($idJurnal);


        $pageData = [
            'title' => "Jurnal",
            'heading' => "Jurnal",
            'active' => "buku",
            'jurnal' => $jurnal,
            'listKodeJurnal' => KodeJurnal::all(),
        ];

        return view('accounting.jurnal.detail', $pageData);
    }

    public function edit(Jurnal $jurnal)
    {
        //
    }


    public function update(Request $request)
    {
        $jurnal = Jurnal::find($request->id_jurnal);
        $jurnal->nama = $request->nama_jurnal;
        $jurnal->id_kode_jurnal = $request->id_kode_jurnal;
        $jurnal->save();

        return redirect()->back();
    }

    public function destroy(Request $request)
    {
        $jurnal = Jurnal::find($request->id_jurnal);
        $jurnal->delete();

        return redirect()->back();
    }
}
