<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;


class AdminController extends Controller
{
	function index()
	{
		$title = 'Dashboard - Admin';
		$heading = 'Admin';
		$active = 'dashboard';
		return view('admin.index', [
			'title' => $title,
			'heading' => $heading,
			'active' => $active
		]);
	}
	function users()
	{
		$title = 'Users - Admin';
		$heading = 'Admin';
		$active = 'users';
		$users = User::with(['role'])->get();
		$roles = Role::all();
		return view('admin.users', [
			'title' => $title,
			'heading' => $heading,
			'users' => $users,
			'active' => $active,
			'roles' => $roles
		]);
	}

	function editRole(Request $request)
	{
		$id = $request['id'];
		$validateData = $request->validate([
			'id_role' => 'required',
		]);
		User::where('id', $id)->update($validateData);
		return redirect('/users')->with('success', 'Edit hak Akses Berhasil');
	}
}
