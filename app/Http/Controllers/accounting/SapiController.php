<?php

namespace App\Http\Controllers\accounting;

use App\Http\Controllers\Controller;
use App\Models\JenisSapi;
use App\Models\Sapi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SapiController extends Controller
{

    public function index()
    {
        $listSapi = [];

        $filterJenis = request('jenis');
        $filterStatus = request('status');
        $filterKondisi = request('kondisi');


        $filtered = $filterJenis || $filterStatus || $filterKondisi;

        if ($filtered) {
            // return request();

            // $listSapi = DB::table('sapis');
            $listSapi = new Sapi();

            if ($filterJenis) {
                $listSapi = $listSapi->where('id_jenis_sapi', $filterJenis);
            }


            if ($filterStatus) {
                $listSapi = $listSapi->where('status', $filterStatus);
            }

            $likeKondisi = '%' . $filterKondisi . '%';
            if ($filterKondisi) {
                $listSapi = $listSapi->where('kondisi', 'like', $likeKondisi);
            }


            $listSapi = $listSapi->get();
            // return $listSapi;
        } else {
            $listSapi = Sapi::all();
        }


        $pageData = [
            'title' => "Stok sapi",
            'heading' => "Stok sapi",
            'active' => "dashboard",
            'listSapi' => $listSapi,
            'listJenisSapi' => JenisSapi::all(),
        ];


        return view('accounting.stok_sapi.index', $pageData);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }
    public function show(Sapi $sapi)
    {
        $pageData = [
            'title' => "Detail sapi",
            'heading' => "Sapi " . $sapi->eartag,
            'active' => "dashboard",
            'sapi' => $sapi,
        ];

        return view('accounting.stok_sapi.detail', $pageData);
    }
    public function edit(Sapi $sapi)
    {
        //
    }

    public function update(Request $request, Sapi $sapi)
    {
        //
    }

    public function setAmbilSapi($idSapi)
    {
        $sapi = Sapi::find($idSapi);
        $sapi->status = "diambil";
        $sapi->save();
        return redirect()->back();
    }

    public function destroy(Sapi $sapi)
    {
        //
    }
}
