<?php

namespace App\Http\Controllers;

use App\Models\DetUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DaftarController extends Controller
{
    function index (){
        return view('daftar');
    }
    function store(Request $request){
       $data = $request->all();

       $user = new User();
       $user->name = $data['name'];
       $user->email = $data['email'];
       $user->password = $data['password'];
       $user->password_confirmation == $user->password;
       $user->save();

       $detuser = new DetUser();
       $detuser->user_id = $user->id;
       $detuser->save();
    //    dd($user,$detuser);
    return redirect('/')->with('success','Berhasil Daftar Silahkan Login');

    }
    // function store(Request $request){
    //     $validateData = $request->validate([
    //         'name' => 'required',
    //         'email' => 'required',
    //         'password' => 'required',
    //         'password_confirmation' => 'required|same:password',
    //     ]);
    //     $validateData['password'] = Hash::make($validateData['password']);
    //     User::create($validateData);
    //     $user_id = DB::table('users')->insertGetId($validateData);
    //     $detuser_id = $user_id;
    //     dd($validateData,$detuser_id);
    //     DetUser::create($user_id);
    //     // dd($validateData);
        // return redirect('/')->with('success','Berhasil Daftar Silahkan Login');
    // }
}
