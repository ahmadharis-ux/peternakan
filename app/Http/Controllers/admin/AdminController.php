<?php

namespace App\Http\Controllers\admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    function index()
    {

        $listRole = Role::all();
        $listRole->each(function ($role) {
            $role->count = User::where('id_role', $role->id)->count();
        });


        $title = 'Admin - Dashboard';
        $heading = 'Admin';
        $active = 'dashboard';
        return view('admin.index', [
            'title' => $title,
            'heading' => $heading,
            'active' => $active,
            'listRole' => $listRole,
        ]);
    }
    function users()
    {
        $listUser = [];
        $filterRole = request('role');

        if ($filterRole) {
            $listUser = User::where('id_role', $filterRole)->get();
        } else {
            $listUser = User::all();
        }

        $title = 'Admin - Users';
        $heading = 'Admin';
        $active = 'users';
        // $users = User::with(['role'])->get();
        $roles = Role::all();
        return view('admin.user.users', [
            'title' => $title,
            'heading' => $heading,
            'users' => $listUser,
            'active' => $active,
            'roles' => $roles
        ]);
    }

    function editRole(Request $request, User $user)
    {
        $validateData = $request->validate([
            'id_role' => 'required',
        ]);

        $user->id_role = $validateData['id_role'];
        $user->save();

        return redirect('/admin/users')->with('success', 'Edit hak Akses Berhasil');
    }
}
