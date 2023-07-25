<?php

namespace App\Http\Controllers\accounting;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Debit;
use App\Models\Faktur;
use App\Models\Kredit;
use Hamcrest\Core\IsNot;
use Illuminate\Http\Request;
use App\Models\TransaksiDebit;

use App\Models\TransaksiKredit;
use App\Models\DetailPembelianSapi;
use App\Models\DetailPenjualanSapi;
use App\Http\Controllers\Controller;
use App\Models\DetailPembelianPakan;
use function PHPUnit\Framework\isNull;
use App\Models\OperasionalPembelianSapi;
use App\Models\OperasionalPenjualanSapi;
use App\Models\OperasionalPembelianPakan;

class InvoiceController extends Controller
{
    function print(Request $request)
    {
        $nomorFaktur = $request->nomor_faktur;

        $faktur = Faktur::where('nomor_faktur', $nomorFaktur)->first();

        $fakturPageData = (json_decode($faktur->page_data, false));

        $debit = $fakturPageData->debit ?? null;
        if ($debit !== null) {
            $listIdTransaksiDebit = [];
            foreach ($debit->transaksi_debit as $trx) {
                $listIdTransaksiDebit[] = $trx->id;
            }

            $listTransaksiDebit = TransaksiDebit::whereIn('id', $listIdTransaksiDebit)->get();

            $debit->transaksiDebit = $listTransaksiDebit;
            $debit->pihakKedua = User::find($debit->id_pihak_kedua);
        }

        $kredit = $fakturPageData->kredit ?? null;
        if ($kredit !== null) {
            $listIdTransaksiKredit = [];
            foreach ($kredit->transaksi_kredit as $trx) {
                $listIdTransaksiKredit[] = $trx->id;
            }

            $listTransaksiKredit = TransaksiKredit::whereIn('id', $listIdTransaksiKredit)->get();

            $kredit->transaksiKredit = $listTransaksiKredit;
            $kredit->pihakKedua = User::find($kredit->id_pihak_kedua);
        }

        // return $kredit;

        $penjualanSapi = $fakturPageData->penjualanSapi ?? null;
        $pembelianSapi = $fakturPageData->pembelianSapi ?? null;
        $pembelianPakan = $fakturPageData->pembelianPakan ?? null;

        // return $pembelianSapi;

        if ($pembelianSapi !== null) {
            // get detail pembelian sapi
            $listIdDetailPembelianSapi = [];
            $listDetailPembelianSapi =  ($pembelianSapi->detail_pembelian_sapi);
            foreach ($listDetailPembelianSapi as $item) {
                $listIdDetailPembelianSapi[] = $item->id;
            }


            $listDetailPembelianSapi = DetailPembelianSapi::whereIn('id', $listIdDetailPembelianSapi)->get();

            // dd($listDetailPembelianSapi);

            // get operasionsl pembelian sapi
            $listIdOperasionalPembelianSapi = [];
            $listOperasionalPembelianSapi =  ($pembelianSapi->operasional_pembelian_sapi);
            foreach ($listOperasionalPembelianSapi as $item) {
                $listIdOperasionalPembelianSapi[] = $item->id;
            }
            $listOperasionalPembelianSapi = OperasionalPembelianSapi::whereIn('id', $listIdOperasionalPembelianSapi)->get();

            $pembelianSapi->detailPembelianSapi = $listDetailPembelianSapi;
            $pembelianSapi->operasionalPembelianSapi = $listOperasionalPembelianSapi;
        }


        if ($penjualanSapi !== null) {
            // get detail penjualan sapi
            $listIdDetailPenjualanSapi = [];
            $listDetailPenjualanSapi =  ($penjualanSapi->detail_penjualan_sapi);
            foreach ($listDetailPenjualanSapi as $item) {
                $listIdDetailPenjualanSapi[] = $item->id;
            }
            $listDetailPenjualanSapi = DetailPenjualanSapi::whereIn('id', $listIdDetailPenjualanSapi)->get();

            // get operasionsl penjualan sapi
            $listIdOperasionalPenjualanSapi = [];
            $listOperasionalPenjualanSapi =  ($penjualanSapi->operasional_penjualan_sapi);
            foreach ($listOperasionalPenjualanSapi as $item) {
                $listIdOperasionalPenjualanSapi[] = $item->id;
            }
            $listOperasionalPenjualanSapi = OperasionalPenjualanSapi::whereIn('id', $listIdOperasionalPenjualanSapi)->get();


            $penjualanSapi->detailPenjualanSapi = $listDetailPenjualanSapi;
            $penjualanSapi->operasionalPenjualanSapi = $listOperasionalPenjualanSapi;
        }


        if ($pembelianPakan !== null) {
            // get detail pembelian pakan
            $listIdDetailPembelianPakan = [];
            $listDetailPembelianPakan =  ($pembelianPakan->detail_pembelian_pakan);
            foreach ($listDetailPembelianPakan as $item) {
                $listIdDetailPembelianPakan[] = $item->id;
            }
            $listDetailPembelianPakan = DetailPembelianPakan::whereIn('id', $listIdDetailPembelianPakan)->get();

            // get operasionsl pembelian pakan
            $listIdOperasionalPembelianPakan = [];
            $listOperasionalPembelianPakan =  ($pembelianPakan->operasional_pembelian_pakan);
            foreach ($listOperasionalPembelianPakan as $item) {
                $listIdOperasionalPembelianPakan[] = $item->id;
            }
            $listOperasionalPembelianPakan = OperasionalPembelianPakan::whereIn('id', $listIdOperasionalPembelianPakan)->get();


            $pembelianPakan->detailPembelianPakan = $listDetailPembelianPakan;
            $pembelianPakan->operasionalPembelianPakan = $listOperasionalPembelianPakan;
        }

        $today = str_replace('-', '/', Carbon::today()->toDateString());

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
            "tanggalCetak" => $today,
            "tanggalDibuat" => $fakturPageData->tanggalDibuat,

        ];


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
