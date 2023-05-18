<?php

namespace App\Http\Controllers\accounting;

use App\Models\Debit;
use App\Models\Kredit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Kas;
use App\Models\Rekening;
use App\Models\Sapi;
use App\Models\User;

class AccountingController extends Controller
{
    function index()
    {
        $pageData = [
            'title' => 'Dashboard - Accounting',
            'heading' => 'Accounting',
            'active' => 'dashboard',
            'date' => Carbon::now()->format('d-m-Y'),
            'totalHutang' => Kredit::getTotalNominal(),
            'totalPiutang' => Debit::getTotalNominal(),
            'stokSapi' => Sapi::where('status', 'ADA')->get()->count(),
            'totalSaldo' => Rekening::getTotalSaldo(),
        ];

        return view('accounting.index', $pageData);
    }

    function kas()
    {
        /**
         *  Halaman kas isina kumpulan
         *  uang masuk (debit) dan uang keluar (kredit)
         *  Bisa pilih kateogri buku.
         *  Jadi teu kudu nyieun controller lain.
         */

        $pageData = [
            'title' => 'Dashboard - Accounting',
            'heading' => 'Accounting',
            'active' => 'dashboard',
            'date' => Carbon::now()->format('d-m-Y'),
            'listKas' => Kas::getAll(),
            'listRekening' => Rekening::all(),
            'listSupplierSapi' => User::getSupplierSapi(),
            'listSupplierPakan' => User::getSupplierPakan(),
        ];
        return view('accounting.kas.index', $pageData);
    }
}
