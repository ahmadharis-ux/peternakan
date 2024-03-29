<?php

namespace App\Http\Controllers\accounting;

use App\Models\Role;
use App\Models\User;
use App\Models\Debit;
use App\Models\Kredit;
use Illuminate\Http\Request;
use App\Models\TransaksiDebit;
use App\Models\TransaksiKredit;
use App\Http\Controllers\Controller;
use App\Models\Faktur;
use App\Models\PemakaianPakan;
use App\Models\PembelianPakan;
use App\Models\PembelianSapi;
use App\Models\PenjualanSapi;

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

        User::create($dataUserBaru);

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
        $roleSlug = str_replace(' ', '_', strtolower($role));

        $listDebit = Debit::where('id_pihak_kedua', $idUser)->get();
        $listKredit = Kredit::where('id_pihak_kedua', $idUser)->get();
        $listFaktur = Faktur::where('id_pihak_kedua', $idUser)->get();

        $listDebitDihandle = Debit::where('id_author', $idUser)->get();
        $listKreditDihandle = Kredit::where('id_author', $idUser)->get();
        $listPemakaianPakanDihandle = PemakaianPakan::where('id_author', $idUser)->get();
        $listFakturDihandle = Faktur::where('id_author', $idUser)->get();

        $listTransaksiDebitDihandle = TransaksiDebit::where('id_author', $idUser)->get();
        $listTransaksiKreditDihandle = TransaksiKredit::where('id_author', $idUser)->get();

        $pageData = [
            'title' => 'User - ' . $role,
            'heading' => $user->fullname,
            'active' => 'user',
            'user' => $user,
            'listKredit' => $listKredit,
            'listDebit' => $listDebit,
            'listFaktur' => $listFaktur,
            'listKreditDihandle' => $listKreditDihandle,
            'listDebitDihandle' => $listDebitDihandle,
            'listPemakaianPakanDihandle' => $listPemakaianPakanDihandle,
            'listFakturDihandle' => $listFakturDihandle,
            'listTransaksiDebitDihandle' => $listTransaksiDebitDihandle,
            'listTransaksiKreditDihandle' => $listTransaksiKreditDihandle,
            'roleSlug' => $roleSlug,
        ];


        return view('accounting.user.detail', $pageData);
    }

    public function showPiutang($idUser, $idDebit)
    {
        $user = User::find($idUser);
        User::getFullname($user);
        $role = $user->role->nama;
        $penjualanSapi = PenjualanSapi::where('id_debit', $idDebit)->first();

        $pageData = [
            'title' => 'User - ' . $role,
            'heading' => $user->fullname . ' - Piutang',
            'active' => 'user',
            'user' => $user,
            'debit' => Debit::find($idDebit),
            'listRiwayatTransaksi' => TransaksiDebit::where('id_debit', $idDebit)->get(),
            'penjualanSapi' => $penjualanSapi,
        ];

        return view('accounting.user.customer.detailPiutang', $pageData);
    }

    public function showHutang($idUser, $idKredit)
    {
        $user = User::find($idUser);
        User::getFullname($user);
        $role = $user->role->nama;

        $pembelianSapi = PembelianSapi::where('id_kredit', $idKredit)->first();
        $pembelianPakan = PembelianPakan::where('id_kredit', $idKredit)->first();


        $pageData = [
            'title' => 'User - ' . $role,
            'heading' => $user->fullname . ' - Piutang',
            'active' => 'user',
            'user' => $user,
            'kredit' => Kredit::find($idKredit),
            'listRiwayatTransaksi' => TransaksiKredit::where('id_kredit', $idKredit)->get(),
            'pembelianSapi' => $pembelianSapi,
            'pembelianPakan' => $pembelianPakan,

        ];

        $roleSlug = str_replace(' ', '_', $role);
        $roleSlug = strtolower($roleSlug);


        return view('accounting.user.' . $roleSlug . '.detailHutang', $pageData);
    }


    function showLogActivity($idUser)
    {
        $user = User::find($idUser);
        User::getFullname($user);
        $role = $user->role->nama;


        $debits = Debit::where('id_author', $idUser)->get();
        $transaksi_debit = TransaksiDebit::where('id_author', $idUser)->get();
        $kredits = Kredit::where('id_author', $idUser)->get();

        $listAktivitas = $debits->concat($kredits)->concat($transaksi_debit)->where('id_author', $idUser)->all();
        dd($listAktivitas);
        $pageData = [
            'title' => 'User - ' . $role,
            'heading' => $user->fullname . ' - Piutang',
            'active' => 'user',
            'user' => $user,
            'listAktivitas' => $listAktivitas,
        ];

        return view('accounting.user.accounting.tableListAktivitas', $pageData);
    }
}
