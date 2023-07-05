<?php

namespace App\Http\Controllers\owner;

use App\Models\Sapi;
use App\Models\Debit;
use App\Models\Kredit;
use App\Models\Rekening;
use Illuminate\Http\Request;
use App\Models\TransaksiDebit;
use Illuminate\Support\Carbon;
use App\Models\TransaksiKredit;
use App\Http\Controllers\Controller;
use App\Models\DetailPemakaianPakan;
use App\Models\DetailPembelianPakan;

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
