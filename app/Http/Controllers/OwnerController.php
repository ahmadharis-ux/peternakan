<?php

namespace App\Http\Controllers;

use App\Models\Hutang;
use App\Models\Kas;
use App\Models\PemakaianPakan;
use App\Models\Pembayaran;
use App\Models\PembelianPakan;
use App\Models\Piutang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OwnerController extends Controller
{
    function index()
    {
        $pageData = [
            'title' => 'Dashboard - Owner',
            'heading' => 'owner',
            'active' => 'dashboard',
            'date' =>  Carbon::now()->format('d-m-Y')
        ];

        return view('owner.index', $pageData);
    }
}
