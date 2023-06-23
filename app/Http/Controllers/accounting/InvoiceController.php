<?php

namespace App\Http\Controllers\accounting;

use App\Models\User;
use App\Models\Debit;
use App\Models\Faktur;
use App\Models\Kredit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hamcrest\Core\IsNot;

use function PHPUnit\Framework\isNull;

class InvoiceController extends Controller
{
    function show(Request $request)
    {
        $nomorFaktur = $request->nomor_faktur;

        $faktur = Faktur::where('nomor_faktur', $nomorFaktur)->first();

        $debit = Debit::find($faktur->id_debit);
        $kredit = Kredit::find($faktur->id_kredit);

        $penjualanSapi = $debit->penjualanSapi ?? null;
        $pembelianSapi = $kredit->pembelianSapi ?? null;
        $pembelianPakan = $kredit->pembelianPakan ?? null;

        $fakturPageData = (json_decode($faktur->page_data, false));
        // $fakturPageData = (array) $fakturPageData;
        // dd($fakturPageData);
        // return gettype($fakturPageData);
        // return ($fakturPageData);

        $pageData = [
            "title" => $fakturPageData->title,
            "subjek" => $faktur->subjek,
            "debit" => $debit,
            "kredit" => $kredit,
            "pembelianPakan" => $pembelianPakan,
            "pembelianSapi" => $pembelianSapi,
            "penjualanSapi" => $penjualanSapi,
            "author" => User::find($faktur->id_author),
            "nomorFaktur" => $faktur->nomor_faktur,
            "jatuhTempo" => $fakturPageData->jatuhTempo,
        ];

        // return ($fakturPageData->penjualanSapi);




        if ($penjualanSapi !== null) {
            return view('accounting.penjualan_sapi.faktur', $pageData);
        }

        if ($pembelianSapi !== null) {
            return view('accounting.pembelian_sapi.faktur', $pageData);
        }

        return view('accounting.pakan.faktur', $pageData);

        // if (isset($fakturPageData->penjualanSapi)) {
        //     return view('accounting.penjualan_sapi.faktur', $fakturPageData);
        // }

        // if (isset($fakturPageData->pembelianSapi)) {
        //     return view('accounting.pembelian_sapi.faktur', $fakturPageData);
        // }

    }
}
