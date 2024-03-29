<?php

namespace App\Http\Controllers\accounting;

use App\Http\Controllers\Controller;
use App\Models\KodeJurnal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDO;

class KodeJurnalController extends Controller
{
    function index()
    {
        $pageData = [
            'title' => "Kode Jurnal",
            'heading' => "Buku - Kode Jurnal",

            'active' => "opsi",

            'listKodeJurnal' => KodeJurnal::all(),
        ];

        return view('accounting.kode_jurnal.index', $pageData);
    }

    function store(Request $request)
    {
        $storeKodeJurnal = [
            "kode" => $request->kode,
            "id_author" => auth()->user()->id,
            "keterangan" => $request->keterangan,
        ];

        KodeJurnal::create($storeKodeJurnal);
        return redirect()->back();
    }
    function edit(Request $request)
    {
        $id = $request['id'];
        $validateData = $request->validate([
            'kode' => 'required',
            'keterangan' => 'required',
        ]);
        KodeJurnal::where('id', $id)->update($validateData);
        return redirect()->back()->with('succes', 'Berhasil di Update');
    }
    function destroy($id)
    {

        KodeJurnal::destroy($id);

        return redirect('acc/kodejurnal');
    }
}
