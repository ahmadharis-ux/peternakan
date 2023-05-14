<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    function index(){
        return view('accounting.customer.index',[
        'title' => 'Customer',
        'heading' => 'Accounting',
        'active' => 'users',
        'customer' => User::where('role_id','6')->get(),
        ]);
    }
    function detail($id){
        return view('accounting.customer.detail',[
        'title' => 'Customer',
        'heading' => 'Accounting',
        'active' => 'users',
        'kas' => Kas::where('user_id',$id)->with(['user'])->get(),
        // 'kas' => User::where('id',$id)->first(),
        ]);
    }
}
