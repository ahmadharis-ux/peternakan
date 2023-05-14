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
    function index(){
        $title = 'Dashboard - Owner';
        $heading = 'owner';
        $active = 'dashboard';
        $date = Carbon::now()->format('d-m-Y');
        //all hutang
        $hutangsapi = Hutang::sum('total_harga');
        $oprsapi = DB::table('operasionals')
            ->join('kas', 'operasionals.kas_id', '=', 'kas.id')
            ->where('kas.jurnal_id', '=', 1)
            ->sum('operasionals.nominal');
        $hutangpakan = PembelianPakan::sum('harga_total');
        $kredit = Pembayaran::sum('kredit');
        $allhutang = $hutangsapi + $oprsapi + $hutangpakan - $kredit;
        //allpiutang
        $piutangsapi = Piutang::sum('total_harga');
        $oprpiutangsapi = DB::table('operasionals')
            ->join('kas', 'operasionals.kas_id', '=', 'kas.id')
            ->where('kas.jurnal_id', '=', 2)
            ->sum('operasionals.nominal');
        $debit = Pembayaran::sum('debit');
        $allpiutang = $piutangsapi + $oprpiutangsapi - $debit;
        //grafik

        //pakan
        $qtybelipakan = PembelianPakan::sum('qty');
        $qtypakaipakan = PemakaianPakan::sum('qty');
        $stokpakan = $qtybelipakan - $qtypakaipakan;
        
        //activity
        $today = Carbon::now()->toDateString();
        $pembayaran = Pembayaran::whereDate('created_at',$today)->get();
        return view('owner.index',[
            'title' => $title,
            'heading' => $heading,
            'active' => $active,
            'date' => $date,
            'stokpakan' => $stokpakan,
            'stoksapi' => Hutang::where('status','Dikandang')->count(),
            'saldo' => Pembayaran::all(),
            'allhutang' => $allhutang,
            'allpiutang' => $allpiutang,
            'trans' => $pembayaran,
        ]);
    }
}
