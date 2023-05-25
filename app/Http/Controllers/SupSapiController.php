<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SupSapiController extends Controller
{
	function index()
	{
		return view('accounting.suppliersapi.index', [
			'title' => 'Supplier sapis',
			'heading' => 'Accounting',
			'active' => 'users',
			'customer' => User::where('id_role', '5')->get(),
		]);
	}
}
