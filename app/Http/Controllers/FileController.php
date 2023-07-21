<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function getProfilePic(User $user)
    {
        if ($user->foto_profil == null) {
            return response()->json([
                'status' => 404,
                'message' => 'user tidak punya foto profil',
            ]);
        }

        $headers = [
            'Content-Description' => 'Foto profil user',
            'Content-Type' => 'image/png',
        ];

        $path = storage_path("app/$user->foto_profil");

        return response()->file($path, $headers);
    }

    public function getFotoTtd(User $user)
    {
        if ($user->foto_ttd == null) {
            return response()->json([
                'status' => 404,
                'message' => 'user tidak punya tanda tangan',
            ]);
        }


        $headers = [
            'Content-Description' => 'Foto profil user',
            'Content-Type' => 'image/png',
        ];

        $path = storage_path("app/$user->foto_ttd");

        return response()->file($path, $headers);
    }
}
