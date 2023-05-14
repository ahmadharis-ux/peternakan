<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SupSapiController extends Controller
{
	function index()
	{
		return view('accounting.suppliersapi.index', [
			'title' => 'Supplier Sapi',
			'heading' => 'Accounting',
			'active' => 'users',
			'customer' => User::where('role_id', '5')->get(),
		]);
	}
}
