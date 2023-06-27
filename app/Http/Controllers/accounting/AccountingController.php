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

        $pageData = [
            'title' => 'Dashboard - Accounting',
            'heading' => 'Accounting',
            'active' => 'dashboard',
            'date' => Carbon::now()->format('d-m-Y'),
            'totalHutang' => Kredit::getTotalNominal() - TransaksiKredit::getTotalNominal(),
            'totalPiutang' => Debit::getTotalNominal() - TransaksiDebit::getTotalNominal(),
            'stokSapi' => Sapi::where('status', 'ADA')->get()->count(),
            'totalSaldo' => Rekening::getTotalSaldo(),
            'jumlahNilaiPembelianPakan' => DetailPembelianPakan::jumlahNilaiPembelianPakan(),
            'jumlahNilaiPemakaianPakan' => DetailPemakaianPakan::jumlahNilaiPemakaianPakan(),
            'dataGrafikTransaksi' => getDataGrafikTransaksi($request),

        ];

        return view('accounting.index', $pageData);
    }

    function kas()
    {
        $historiKas = Kas::getHistoryTransaksi();

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
