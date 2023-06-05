<?php

namespace App\Http\Controllers\accounting;

use App\Models\Role;
use App\Models\User;
use App\Models\Debit;
use App\Models\Kredit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->nama_depan = $request->nama_depan;
        $user->nama_belakang = $request->nama_belakang;
        $user->email = $request->email;
        $user->id_role = $request->id_role;
        $user->telepon = $request->telepon;
        $user->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->back();
    }

    public function show($idUser)
    {
        $user = User::find($idUser);
        User::getFullname($user);

        $role = $user->role->nama;

        $listKredit = Kredit::where('id_pihak_kedua', $idUser)->get();
        $listDebit = Debit::where('id_pihak_kedua', $idUser)->get();
        $listAktivitas = User::where('id',$idUser)->with('pembelianSapi')->get();

        $pageData = [
            'title' => 'User - ' . $role,
            'heading' => $user->fullname,
            'active' => 'user',
            'user' => $user,
            'listKredit' => $listKredit,
            'listDebit' => $listDebit,
            'listAktivitas' =>  $listAktivitas,
        ];

        return view('accounting.user.detail', $pageData);
    }

    public function showPiutang($idUser, $idDebit)
    {
        $user = User::find($idUser);
        User::getFullname($user);
        $role = $user->role->nama;

        $pageData = [
            'title' => 'User - ' . $role,
            'heading' => $user->fullname . ' - Piutang',
            'active' => 'user',
            'user' => $user,
            'debit' => Debit::find($idDebit),
        ];

        return view('accounting.user.customer.detailPiutang', $pageData);
    }
}
