<?php

namespace App\Http\Controllers\accounting;

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
