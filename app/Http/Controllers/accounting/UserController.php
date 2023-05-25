<?php

namespace App\Http\Controllers\accounting;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;

class UserController extends Controller
{
    private $roleLookoup = [
        "owner" => 1,
        "admin" => 2,
        "accounting" => 3,
        "supplier_pakan" => 4,
        "supplier_sapi" => 5,
        "customer" => 6,
        "pekerja" => 7,
        "user" => 8,
    ];

    function index($namaRole)
    {
        $listUser = null;

        if ($namaRole === 'all') {
            $listUser = User::all();
        } else {
            $listUser = User::where('id_role', $this->roleLookoup[$namaRole])->get();
        }

        $listUser = withFullname($listUser);

        $pageData = [
            'title' => 'User',
            'heading' => 'User',
            'active' => 'user',
            'listUser' => $listUser,
            'listRole' => Role::all(),
        ];

        return view('accounting.user.index', $pageData);
    }

    function store(Request $request)
    {
    }
}
