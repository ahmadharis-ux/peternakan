<?php

namespace App\Http\Controllers\accounting;

use App\Http\Controllers\Controller;
use App\Models\Faktur;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    function show(Request $request)
    {
        $nomorFaktur = $request->nomor_faktur;

        $faktur = Faktur::where('nomor_faktur', $nomorFaktur)->first();


        $fakturPageData = (json_decode($faktur->page_data));
        // $fakturPageData = (array) $fakturPageData;
        // dd($fakturPageData);
        // return gettype((array) $fakturPageData);
        // return ($fakturPageData);

        if (isset($fakturPageData->penjualanSapi)) {
            return view('accounting.penjualan_sapi.faktur', collect($fakturPageData));
        }

        if (isset($fakturPageData->pembelianSapi)) {
            return view('accounting.pembelian_sapi.faktur', $fakturPageData);
        }

        return view('accounting.pakan.faktur', $fakturPageData);
    }
}
