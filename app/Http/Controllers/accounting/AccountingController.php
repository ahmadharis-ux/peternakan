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
        // return Kas::getView();

        $pageData = [
            'title' => 'Dashboard - Accounting',
            'heading' => 'Accounting',
            'active' => 'dashboard',
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
}
