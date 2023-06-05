<?php

namespace App\Http\Controllers;

use App\Models\Debit;
use App\Models\DetailPemakaianPakan;
use App\Models\DetailPembelianPakan;
use App\Models\Hutang;
use App\Models\Kas;
use App\Models\Kredit;
use App\Models\PemakaianPakan;
use App\Models\Pembayaran;
use App\Models\PembelianPakan;
use App\Models\Piutang;
use App\Models\Rekening;
use App\Models\Sapi;
use App\Models\TransaksiDebit;
use App\Models\TransaksiKredit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OwnerController extends Controller
{
    function index()
    {
        $aa = new DetailPembelianPakan();
        $a = $aa->jumlahNilaiPembelianPakan();
        $bb = new DetailPemakaianPakan();
        $b = $bb->jumlahNilaiPemakaianPakan();
        $tanggalIni = Carbon::now()->format('Y-m-d');
        $kredit = TransaksiKredit::whereDate('created_at', $tanggalIni)->get();
        $debit = TransaksiDebit::whereDate('created_at', $tanggalIni)->get();

        $semuaTransaksi = $kredit->concat($debit)->sortByDesc('created_at');
        
        $pageData = [
            'title' => 'Dashboard - Owner',
            'heading' => 'owner',
            'active' => 'dashboard',
            'date' =>  Carbon::now()->format('Y-m-d'),
            'jumlahNilaiPembelianPakan' => $a,
            'jumlahNilaiPemakaianPakan' => $b,
            'totalHutang' => Kredit::getTotalNominal() - TransaksiKredit::getTotalNominal(),
            'totalPiutang' => Debit::getTotalNominal(),
            'stokSapi' => Sapi::where('status', 'ADA')->get()->count(),
            'totalSaldo' => Rekening::getTotalSaldo(),
            'transaksi' => $semuaTransaksi
        ];

        return view('owner.index', $pageData);
    }
}
