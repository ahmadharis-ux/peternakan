<?php

namespace App\Http\Controllers;

use App\Models\Hutang;
use App\Models\Jurnal;
use App\Models\Kas;
use App\Models\Kashbon;
use App\Models\Operasional;
use App\Models\Pakan;
use App\Models\PemakaianPakan;
use App\Models\Pembayaran;
use App\Models\PembelianPakan;
use App\Models\Piutang;
use App\Models\Rekening;
use App\Models\Salary;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Stmt\Return_;

class AccController extends Controller
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
    //dari index akuntan
    function stoksapi()
    {
        $pageData = [
            'title' => 'Dashboard - Accounting',
            'heading' => 'Stok sapi',
            'active' => 'dashboard',
            'date' => Carbon::now()->format('d-m-Y'),
        ];

        return view('accounting.index', $pageData);
    }

    //ubah status sapi
    function editstatus(Request $request)
    {
        $id = $request['id'];
        $validateData = $request->validate([
            'status' => 'required',
        ]);
        Hutang::where('id', $id)->update($validateData);
        return redirect()->back();
    }
    //hutang sapi pakan dan pekerja
    function allhutang()
    {
        //hutang sapi
        $hutangsapi = Hutang::sum('total_harga');
        $oprsapi = DB::table('operasionals')
            ->join('kas', 'operasionals.kas_id', '=', 'kas.id')
            ->where('kas.jurnal_id', '=', 1)
            ->sum('operasionals.nominal');
        $kreditsapi = DB::table('pembayarans')
            ->join('kas', 'pembayarans.kas_id', '=', 'kas.id')
            ->where('kas.jurnal_id', '=', 1)
            ->sum('pembayarans.kredits');
        $allsapi = $hutangsapi + $oprsapi - $kreditsapi;
        //hutang pakan
        $hutangpakan = PembelianPakan::sum('harga_total');
        $kreditpakan = DB::table('pembayarans')
            ->join('kas', 'pembayarans.kas_id', '=', 'kas.id')
            ->where('kas.jurnal_id', '=', 3)
            ->sum('pembayarans.kredits');
        $allpakan = $hutangpakan - $kreditpakan;
        $title = 'Dashboard - Accounting';
        $heading = 'Accounting';
        $active = 'dashboard';
        return view('accounting.total_hutang.index', [
            'title' => $title,
            'heading' => $heading,
            'active' => $active,
            'allsapis' => $allsapi,
            'allpakans' => $allpakan,
        ]);
    }
    //kas
    function indexKas()
    {
        $title = 'Buku - Kas';
        $heading = 'Accounting';
        $active = 'buku';
        $date = Carbon::now()->format('d-m-Y');
        $datapakan = Pakan::all();
        $rekening = Rekening::all();
        $saldorekening = Pembayaran::with(['rekenings'])->sum('debits');
        return view('accounting.kas.index', [
            'title' => $title,
            'heading' => $heading,
            'active' => $active,
            'date' => $date,
            'kas' => Kas::all()->sortByDesc('tanggal'),
            'owner' => User::where('role_id', '1')->get(),
            'suppakans' => User::where('role_id', '4')->get(),
            'pekerja' => User::where('role_id', '7')->get(),
            'prive' => Jurnal::where('id', '6')->first(),
            'servis' => Jurnal::where('id', '9')->first(),
            'pakans' => Jurnal::where('id', '3')->first(),
            'gaji' => Jurnal::where('id', '4')->first(),
            'hutang' => Jurnal::where('id', '1')->first(),
            'supsapis' => User::where('role_id', '5')->get(),
            'cust' => User::where('role_id', '6')->get(),
            'datapakans' => $datapakan,
            'rekenings' => $rekening,
        ]);
    }

    function storeKas(Request $request)
    {
        $validasiData = $request->validate([
            'user_id' => 'nullable',
            'keterangan' => 'required',
            'jurnal_id' => 'required',
            'pakan_id' => 'nullable',
            'author' => 'required',
        ]);
        Kas::create($validasiData);

        return redirect()->back();
    }

    function detKas($jurnal_id, $id)
    {
        $data = Kas::where('id', $id)->with(['hutang', 'piutang', 'operasional', 'pembayaran', 'user', 'belipakans', 'salary', 'kasbon'])->first();
        $salary = Salary::where('kas_id', $id)->first();
        if ($jurnal_id == 1) {
            return view('accounting.kas.detail.hutang', [
                'data' => $data,
                'title' => 'Data Kas',
                'active' => 'buku',
            ]);
        } elseif ($jurnal_id == 2) {
            return view('accounting.kas.detail.piutang', [
                'data' => $data,
                'title' => 'Data Kas',
                'active' => 'buku',
                'rekenings' => Rekening::all(),
                'sapis' => Hutang::where('status', 'Dikandang')->get(),
            ]);
        } elseif ($jurnal_id == 3) {
            return view('accounting.kas.detail.pakans', [
                'data' => $data,
                'title' => 'Data Kas',
                'active' => 'buku',
                'pakans' => pakan::all(),
            ]);
        } elseif ($jurnal_id == 4) {
            return view('accounting.kas.detail.gaji', [
                'data' => $data,
                'title' => 'Data Kas',
                'active' => 'buku',
                'salary' => $salary,
            ]);
        }
    }

    function storesapi(Request $request)
    {
        $validasiData = $request->validate([
            'kas_id' => 'required',
            'eartag' => 'required',
            'bobot' => 'required',
            'harga_kg' => 'required',
            'keterangan' => 'required',
            'kondisi' => 'required',
            'total_harga' => 'required',
        ]);
        Hutang::create($validasiData);
        return redirect()->back();
    }

    function storeopr(Request $request)
    {
        $validasiData = $request->validate([
            'kas_id' => 'required',
            'keterangan' => 'required',
            'nominal' => 'required',
        ]);
        Operasional::create($validasiData);
        return redirect()->back();
    }

    function storetrans(Request $request)
    {
        $validasiData = $request->validate([
            'kas_id' => 'required',
            'ket' => 'required',
            'debits' => 'nullable',
            'kredits' => 'nullable',
            'author' => 'required',
            'saldo' => 'nullable',
            'rekening_id' => 'nullable',
        ]);
        Pembayaran::create($validasiData);
        return redirect()->back();
    }

    function storepiutang(Request $request)
    {
        //validasi input
        $request->validate([
            'kas_id' => 'required',
            'hutang_id' => 'required|unique:piutangs,hutang_id',
            'keterangan' => 'required',
            'bobot' => 'required',
            'harga_kg' => 'required',
            'total_harga' => 'required',
            'kondisi' => 'required',
            'status' => 'nullable',
            'author' => 'required',
        ]);

        //simpandata piutang
        $piutang = new Piutang();
        $piutang->kas_id = $request->kas_id;
        $piutang->hutang_id = $request->hutang_id;
        $piutang->keterangan = $request->keterangan;
        $piutang->bobot = $request->bobot;
        $piutang->harga_kg = $request->harga_kg;
        $piutang->total_harga = $request->total_harga;
        $piutang->kondisi = $request->kondisi;
        $piutang->author = $request->author;
        $piutang->status = $request->status;
        $piutang->save();

        //update status hutang
        $hutang = Hutang::where('id', $request->hutang_id)->first();
        $hutang->status = 'Terjual masih dikandang';
        $hutang->save();

        return redirect()->back();
    }

    //HUTANG
    function indexHutang()
    {
        $kas = Kas::where('jurnal_id', 1)->get();
        return view('accounting.hutang.index', [
            'title' => 'Buku - Hutang',
            'heading' => 'Accounting',
            'active' => 'buku',
            'kas' => $kas,
            'supsapis' => User::where('role_id', '5')->get(),
        ]);
    }

    //PIUTANG
    function indexPiutang()
    {
        $kas = Kas::where('jurnal_id', 2)->get();
        return view('accounting.piutang.index', [
            'title' => 'Buku - Piutang',
            'heading' => 'Accounting',
            'active' => 'buku',
            'kas' => $kas,
        ]);
    }

    //PAKAN
    public function indexpakan()
    {
        $title = 'Buku - pakans';
        $heading = 'Accounting';
        $active = 'buku';
        return view('accounting.pakan.index', [
            'title' => $title,
            'heading' => $heading,
            'active' => $active,
            'pakans' => Pakan::with(['belipakans', 'pakaipakans'])->get(),
            'supplier' => User::where('role_id', '4')->get(),
        ]);
    }

    public function storepakan(Request $request)
    {
        $validasidata = $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'satuan' => 'required',
            'author' => 'required',
        ]);
        Pakan::create($validasidata);

        return redirect()->back();
    }

    public function beliPakan(Request $request)
    {
        $validasiData = $request->validate([
            'pakan_id' => 'required',
            'qty' => 'required',
            'harga_satuan' => 'required',
            'harga_total' => 'required',
            'author' => 'required',
            'kas_id' => 'required',
        ]);
        // dd($validasiData);
        PembelianPakan::create($validasiData);

        return redirect()->back();
    }

    function pemakaianpakan(Request $request)
    {
        $validasiData = $request->validate([
            'pakan_id' => 'required',
            'qty' => 'required',
            'author' => 'required',
        ]);
        // dd($validasiData);
        PemakaianPakan::create($validasiData);

        return redirect()->back();
    }

    //GAJI
    function storesalary(Request $request)
    {
        $validasiData = $request->validate([
            'salary' => 'required',
            'kas_id' => 'required',
            'author' => 'required',
        ]);
        // dd($validasiData);
        Salary::create($validasiData);

        return redirect()->back();
    }

    function storekashbon(Request $request)
    {
        $validasiData = $request->validate([
            'kas_id' => 'required',
            'user_id' => 'required',
            'nominal' => 'required',
            'author' => 'required',
            'keterangan' => 'required',
        ]);
        // dd($validasiData);
        Kashbon::create($validasiData);

        return redirect()->back();
    }
}
