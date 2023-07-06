<?php

namespace App\Http\Controllers;

use App\Models\DetUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DaftarController extends Controller
{
    function index()
    {
        return view('daftar');
    }
    function store(Request $request)
    {

        if ($request->password != $request->password_confirmation) {
            return 'Password confirmation not match';
        }

        $request->validate([
            'nama_depan' => "required",
            'email' => "required",
            'password' => "required|min:8",
            'password_confirmation' => "required|same:password",
        ]);

        User::create([
            "nama_depan" => $request->nama_depan,
            "nama_belakang" => $request->nama_belakang,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        return redirect('/')->with('success', 'Berhasil Daftar Silahkan Login');
    }
}
