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
        $idRole = null;
        $role = null;
        if ($namaRole === 'all') {
            $listUser = User::all();
            $role = 'User';
            $idRole = 'all';
        } else {
            $idRole = $this->roleLookoup[$namaRole];
            $listUser = User::where('id_role', $idRole)->get();
            $role = Role::find($idRole)->nama;
            $role = ucfirst($role);
        }

        $listUser = withFullname($listUser);

        $pageData = [
            'title' => 'User - ' . $role,
            'heading' => 'List - ' . $role,
            'active' => 'user',
            'listUser' => $listUser,
            'listRole' => Role::all(),
            'idRoleDipilih' => $idRole,
            'namaRoleDipilih' => $role,
        ];

        return view('accounting.user.index', $pageData);
    }

    function store(Request $request)
    {
        $dataUserBaru = $request->only([
            'nama_depan',
            'nama_belakang',
            'email',
            'id_role',
            'telepon',
            'password',
        ]);

        User::insert($dataUserBaru);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back();
    }
}
