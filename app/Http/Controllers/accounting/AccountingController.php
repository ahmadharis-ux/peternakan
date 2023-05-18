<?php

namespace App\Http\Controllers\accounting;

use App\Models\Debit;
use App\Models\Kredit;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Sapi;

class AccountingController extends Controller
{
    function index()
    {
        $pageData = [
            'title' => 'Dashboard - Accounting',
            'heading' => 'Accounting',
            'active' => 'dashboard',
            'date' => Carbon::now()->format('d-m-Y'),
            'totalHutang' => Kredit::all()->sum('nominal'),
            'totalPiutang' => Debit::all()->sum('nominal'),
            'stokSapi' => Sapi::where('status', 'ADA')->get()->count(),
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

        $pageData = [];
        return view();
    }
}
