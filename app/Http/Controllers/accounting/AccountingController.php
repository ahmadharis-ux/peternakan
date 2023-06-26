<?php

namespace App\Http\Controllers\accounting;

use App\Models\Kas;
use App\Models\Sapi;
use App\Models\User;
use App\Models\Debit;
use App\Models\Pakan;
use App\Models\Kredit;
use App\Models\Rekening;
use Carbon\CarbonPeriod;
use App\Models\StokPakan;
use Illuminate\Http\Request;
use App\Models\PembelianPakan;
use App\Models\TransaksiDebit;
use Illuminate\Support\Carbon;
use App\Models\TransaksiKredit;
use App\Http\Controllers\Controller;
use App\Models\DetailPemakaianPakan;
use App\Models\DetailPembelianPakan;

class AccountingController extends Controller
{



    function index(Request $request)
    {
        $aa = new DetailPembelianPakan();
        $a = $aa->jumlahNilaiPembelianPakan();
        $bb = new DetailPemakaianPakan();
        $b = $bb->jumlahNilaiPemakaianPakan();

        // ========================================== GRAFIK TRANSAKSI
        $dt = Carbon::now();
        $awalBulan = $dt->startOfMonth()->toDateString();
        $akhirBulan = $dt->endOfMonth()->toDateString();

        $fromDate = $request->query('from_date') ?? $awalBulan;
        $toDate = $request->query('to_date') ?? $akhirBulan;

        $period = CarbonPeriod::create($fromDate, $toDate);
        $dateList = [];
        foreach ($period as $date) {
            $dateList[] = $date->toDateString();
        }

        $listTransaksiDebit = TransaksiDebit::whereBetween('created_at', [$fromDate, $toDate])->get();
        $listTransaksiKredit = TransaksiKredit::whereBetween('created_at', [$fromDate, $toDate])->get();

        $listTransaksiDebit->each(function ($trx) {
            $date = Carbon::create($trx->created_at)->toDateString();
            $trx->createdDate = $date;
        });

        $listTransaksiKredit->each(function ($trx) {
            $date = Carbon::create($trx->created_at)->toDateString();
            $trx->createdDate = $date;
        });

        $trxByDate = $listTransaksiDebit->groupBy('createdDate');
        $trxDebitByDate = $trxByDate->map(function ($trxList) {
            return $trxList->sum('nominal');
        });

        $trxByDate = $listTransaksiKredit->groupBy('createdDate');
        $trxKreditByDate = $trxByDate->map(function ($trxList) {
            return $trxList->sum('nominal');
        });

        $listNominalTrxDebitByDate = [];
        $listNominalTrxKreditByDate = [];

        foreach ($dateList as $date) {
            $listNominalTrxDebitByDate[] = $trxDebitByDate[$date] ?? 0;
            $listNominalTrxKreditByDate[] = $trxKreditByDate[$date] ?? 0;
        }
        // ==================================================================

        $pageData = [
            'title' => 'Dashboard - Accounting',
            'heading' => 'Accounting',
            'active' => 'dashboard',
            'date' => Carbon::now()->format('d-m-Y'),
            'totalHutang' => Kredit::getTotalNominal() - TransaksiKredit::getTotalNominal(),
            'totalPiutang' => Debit::getTotalNominal() - TransaksiDebit::getTotalNominal(),
            'stokSapi' => Sapi::where('status', 'ADA')->get()->count(),
            'totalSaldo' => Rekening::getTotalSaldo(),
            'jumlahNilaiPembelianPakan' => $a,
            'jumlahNilaiPemakaianPakan' => $b,
            'listNominalTrxKreditByDate' => collect($listNominalTrxKreditByDate),
            'listNominalTrxDebitByDate' => collect($listNominalTrxDebitByDate),
            'fromDate' => $fromDate,
            'toDate' => $toDate,
            'dateList' => json_encode($dateList),

        ];

        return view('accounting.index', $pageData);
    }

    function kas()
    {
        $historiKas = Kas::getHistoryTransaksi();
        // return $historiKas;


        $pageData = [
            'title' => 'Buku - Kas',
            'heading' => 'Accounting',
            'active' => 'buku',
            'listRekening' => Rekening::all(),
            'historiKas' => $historiKas,
            'listSupplierSapi' => User::getSupplierSapi(),
            'listCustomer' => User::getCustomer(),

        ];

        return view('accounting.kas.index', $pageData);
    }

    function detailSaldoDanAset()
    {
        $jumlahNilaiPembelianPakan = DetailPembelianPakan::jumlahNilaiPembelianPakan();
        $jumlahNilaiPemakaianPakan = DetailPemakaianPakan::jumlahNilaiPemakaianPakan();

        $pageData = [
            'title' => 'Dashboard - Accounting',
            'heading' => 'Accounting',
            'jumlahNilaiPembelianPakan' => $jumlahNilaiPembelianPakan,
            'jumlahNilaiPemakaianPakan' => $jumlahNilaiPemakaianPakan,
            'totalSaldo' => Rekening::getTotalSaldo(),
            'active' => 'dashboard',
        ];
        return view('accounting.total_saldo_aset.index', $pageData);
    }
    function RincianHutangPerusahaan()
    {
        // hutang sapi
        $hutangSapi = Kredit::getHutangSapi();

        //hutangpakan
        $hutangPakan = Kredit::getHutangPakan();

        //hutangPekerja
        $hutangGaji = Kredit::getHutangGaji();

        $pageData = [
            'title' => 'Dashboard - Accounting',
            'heading' => 'Accounting',
            'active' => 'dashboard',
            'hutangSapi' => $hutangSapi->sum('nominal'),
            'totalTransaksiHutangSapi' => Kredit::getTotalTransaksi($hutangSapi),
            'hutangPakan' => $hutangPakan->sum('nominal'),
            'totalTransaksiHutangPakan' => Kredit::getTotalTransaksi($hutangPakan),
            'hutangGaji' => $hutangGaji->sum('nominal'),
            'totalTransaksiHutangGaji' => Kredit::getTotalTransaksi($hutangGaji),
        ];

        return view('accounting.total_hutang.index', $pageData);
    }

    function RincianPiutangPerusahaan()
    {
        // piutang sapi
        $piutangSapi = Debit::getPiutangSapi();

        $pageData = [
            'title' => 'Dashboard - Accounting',
            'heading' => 'Accounting',
            'active' => 'dashboard',
            'piutangSapi' => $piutangSapi->sum('nominal'),
            'totalTransaksiPiutangSapi' => Debit::getTotalTransaksi($piutangSapi),
        ];

        return view('accounting.total_piutang.index', $pageData);
    }
}
