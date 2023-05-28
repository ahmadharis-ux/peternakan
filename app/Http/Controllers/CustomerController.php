<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
	function index()
	{
		$pageData = [
			'title' => 'Customer',
			'heading' => 'Accounting',
			'active' => 'users',
			'customer' => User::where('id_role', '6')->get(),
		];

		return view('accounting.customer.index', $pageData);
	}

	function detail($id)
	{
		$pageData = [
			'title' => 'Customer',
			'heading' => 'Accounting',
			'active' => 'users',
			// 'kas' => Kas::where('user_id', $id)->with(['user'])->get(),
			'kas' => 5,
			'jumlah_customer' => User::where('id_role', 6)->count(),
		];

		return view('accounting.customer.detail', $pageData);
	}
}
