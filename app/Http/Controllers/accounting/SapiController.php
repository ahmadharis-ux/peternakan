<?php

namespace App\Http\Controllers\accounting;

use App\Http\Controllers\Controller;
use App\Models\DetailPenjualanSapi;
use App\Models\JenisSapi;
use App\Models\Sapi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
            'detailPenjualanSapi' => DetailPenjualanSapi::where('id_sapi', $sapi->id)->first(),
        ];
        // return($pageData);

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

    public function setAmbilSapi(Sapi $sapi)
    {
        try {
            DB::transaction(function () use ($sapi) {
                $sapi->status = "SOLD";
                $sapi->save();

                $detailPenjualanSapi = $sapi->detailPenjualanSapi()->first();
                $detailPenjualanSapi->tanggal_pengambilan = Carbon::now();
                $detailPenjualanSapi->save();
            });

            return redirect()->back();
        } catch (\Exception $e) {
            Log::error('gagal ambil sapi');
            return redirect()->back()->with('error', 'gagal ambil sapi');
        }
    }

    public function destroy(Sapi $sapi)
    {
        //
    }
}
