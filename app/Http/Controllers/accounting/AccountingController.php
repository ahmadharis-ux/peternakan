<?php

namespace App\Http\Controllers\accounting;

use App\Models\Kas;
use App\Models\Sapi;
use App\Models\User;
use App\Models\Debit;
use App\Models\Pakan;
use App\Models\Kredit;
use App\Models\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\DetailPemakaianPakan;
use App\Models\DetailPembelianPakan;
use App\Models\StokPakan;
use App\Models\TransaksiKredit;

class AccountingController extends Controller
{
    function index() 
    {
        $aa = new DetailPembelianPakan();
        $a = $aa->jumlahNilaiPembelianPakan();
        $bb = new DetailPemakaianPakan();
        $b = $bb->jumlahNilaiPemakaianPakan();

        $pageData = [
            'title' => 'Dashboard - Accounting',
            'heading' => 'Accounting',
            'active' => 'dashboard',
            'date' => Carbon::now()->format('d-m-Y'),
            'totalHutang' => Kredit::getTotalNominal() - TransaksiKredit::getTotalNominal(),
            'totalPiutang' => Debit::getTotalNominal(),
            'stokSapi' => Sapi::where('status', 'ADA')->get()->count(),
            'totalSaldo' => Rekening::getTotalSaldo(),
            'jumlahNilaiPembelianPakan' => $a,
            'jumlahNilaiPemakaianPakan' => $b,
        ];

        return view('accounting.index', $pageData);
    }

    function kas()
    {
        // return Kas::getView();

        $pageData = [
            'title' => 'Buku - Kas',
            'heading' => 'Accounting',
            'active' => 'buku',
            'date' => Carbon::now()->format('d-m-Y'),
            'listKas' => Kas::getView(),
            'listRekening' => Rekening::all(),
            'listSupplierSapi' => User::getSupplierSapi(),
            'listSupplierPakan' => User::getSupplierPakan(),
            'listPekerja' => User::getPekerja(),
            'listCustomer' => User::getCustomer(),
            'listPakan' => Pakan::all(),
        ];

        return view('accounting.kas.index', $pageData);
    }
    function detailSaldoDanAset(){
        $aa = new DetailPembelianPakan();
        $a = $aa->jumlahNilaiPembelianPakan();
        $bb = new DetailPemakaianPakan();
        $b = $bb->jumlahNilaiPemakaianPakan();

        $pageData = [
            'title' => 'Dashboard - Accounting',
            'heading' => 'Accounting',
            'jumlahNilaiPembelianPakan' => $a,
            'jumlahNilaiPemakaianPakan' => $b,
            'totalSaldo' => Rekening::getTotalSaldo(),
            'active' => 'dashboard',
        ];
        return view ('accounting.total_saldo_aset.index',$pageData);
    }
    function RincianHutangPerusahaan(){
        //hutangpakan
        $kredit = new Kredit();
        $hutangPakan = $kredit->getHutangPakan();


        //hutangPekerja
        $hutangGaji = $kredit->getHutangGaji();
        $pageData = [
            'title' => 'Dashboard - Accounting',
            'heading' => 'Accounting',
            'active' => 'dashboard',
            'hutangPakan' => $hutangPakan,
            'hutangGaji' => $hutangGaji,
        ];
        return view ('accounting.total_hutang.index',$pageData);
    }
}
