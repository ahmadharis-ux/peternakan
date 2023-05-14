<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    function index()
    {
        return view('login');
    }
    function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return redirect()->back();
        }
        $user = Auth::user();


        if ($user->role_id === 2) {
            return redirect('/admin');
        } elseif ($user->role_id === 3) {
            return redirect('/acc');
        } elseif ($user->role_id === 1) {
            return redirect('/owner');
            // return redirect('/acc');
            // return redirect('/admin');
            dd($user);
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