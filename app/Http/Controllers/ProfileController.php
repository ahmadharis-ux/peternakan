<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    function index()
    {
        $title = 'Profile';
        $heading = 'Admin';
        $active = 'profle';
        return view('profile', [
            'title' => $title,
            'heading' => $heading,
            'active' => $active,
        ]);
    }
    function edit()
    {
        $title = 'Profile';
        $heading = 'Admin';
        $active = 'profle';
        return view('edit_profile', [
            'title' => $title,
            'heading' => $heading,
            'active' => $active,
        ]);
    }
    function update(Request $request)
    {
        $id = Auth::id();
        $validasiData = $request->validate([
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'alamat' => 'nullable',
            'foto_ttd' => 'nullable',
            'foto_profil' => 'nullable',
            'telepon' => 'nullable',
        ]);

        // foto profil
        if ($request->hasFile('foto_profil')) {
            // Hapus foto sebelumnya
            $user = User::find($id);
            if ($user->foto_ttd) {
                Storage::delete($user->foto_ttd);
            }

            // Simpan foto baru
            $path = $request->file('foto_profil')->store('public/foto_profil');
            $validasiData['foto_profil'] = $path;
        }


        // foto ttd
        if ($request->hasFile('foto_ttd')) {
            // Hapus foto sebelumnya
            $user = User::find($id);
            if ($user->foto_ttd) {
                Storage::delete($user->foto_ttd);
            }

            // Simpan foto baru
            $path = $request->file('foto_ttd')->store('public/foto_ttd');
            $validasiData['foto_ttd'] = $path;
        }


        User::where('id', $id)->update($validasiData);
        return redirect('/profile');
    }
}
