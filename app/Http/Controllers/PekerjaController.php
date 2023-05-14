<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\Kashbon;
use App\Models\Pembayaran;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PekerjaController extends Controller
{
    function index(){
        return view('accounting.gaji.index',[
            'title' => 'Buku - Gaji',
            'active' => 'buku',
            'heading' => 'Accounting',
            'pekerja' => User::where('role_id','7')->get(),
            'accounting' => User::where('role_id','3')->get(),
        ]);
    }
    function detail_pekerja($id){
        $datagaji = Kas::where('user_id',$id)->with(['pembayaran'])->get();

        return view('accounting.gaji.detail',[
            'title' => 'Buku - Gaji',
            'active' => 'buku',
            'heading' => 'Accounting',
            'data' => User::where('id',$id)->first(),
            'date' => Carbon::now(),
            'datakasbon' => Kashbon::where('user_id',$id)->get(), 
            'datagaji' => $datagaji,
        ]);
    }
}
