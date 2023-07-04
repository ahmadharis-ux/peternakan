<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    private function autoLogin($role = 'accounting')
    {
        $credentials = [
            "email" => "$role@gmail.com",
            "password" => "password"
        ];

        $loginAttempt =  (Auth::attempt($credentials));

        if (!$loginAttempt) {
            return redirect()->back();
        }
        $user = Auth::user();



        if ($user->id_role === 2) {
            return redirect()->intended('/admin');
        } elseif ($user->id_role === 3) {
            return redirect()->intended('/acc');
        } elseif ($user->id_role === 1) {
            return redirect()->intended('/owner');
        }

        return 'gagal auto login';
    }

    function index()
    {
        // AUTO LOGIN SEMENTARA =======================
        // default role = accounting
        // return $this->autoLogin('accounting');
        // =======================


        return view('login');
    }
    function login(Request $request)
    {

        $credentials = $request->only('email', 'password');
        $loginAttempt =  (Auth::attempt($credentials));

        if (!$loginAttempt) {
            return redirect()->back();
        }
        $user = Auth::user();

        if ($user->id_role === 2) {
            return redirect()->intended('/admin');
        } elseif ($user->id_role === 3) {
            return redirect()->intended('/acc');
        } elseif ($user->id_role === 1) {
            return redirect()->intended('/owner');
        }
        return redirect('/blank');
    }
    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    function changePassword(Request $request)
    {
        $request->validate([
            'oldpassword' => 'required|current_password',
            'newpassword' => 'required|confirmed',
            'renewpassword' => 'required|same:newpassword',
        ]);
        $user = User::find(Auth::id());
        $user->password = Hash::make($request->newpassword);
        $user->save();
        $request->session()->regenerate();
        return back()->with('success', 'Password Berhasil Di ubah');
    }
}
