<?php

namespace App\Http\Controllers\accounting;

use App\Http\Controllers\Controller;
use App\Models\Kredit;
use App\Models\Rekening;
use App\Models\TransaksiKredit;
use App\Models\User;
use Illuminate\Http\Request;

class KreditController extends Controller
{

	public function index()
	{
		$listSupplierSapi = User::where('id_role', '5')->get();
		$listSupplierSapi = withFullname($listSupplierSapi);

		$pageData = [
			'title' => "Buku - Hutang",
			'heading' => "Buku - Hutang",
			'active' => "buku",
			'kredit' => Kredit::all(),
			'listSupplierSapi' => $listSupplierSapi,
		];

		return view('accounting.kredit.index', $pageData);
	}

	public function create()
	{
		//
	}

	public function store(Request $request)
	{
		//
	}

	public function storeTransaksi(Request $request)
	{
		$idKredit = $request->id_kredit;
		$idRekening = $request->id_rekening;
		$sisaKredit = Kredit::getSisaPembayaran($idKredit);
		$nominalBayar = $request->nominal;
		$adm = $request->adm;

		if ($nominalBayar > $sisaKredit) {
			return redirect()->back()->withErrors('Nominal pembayaran melebihi sisa kredit!');
		}

		$transaksiKredit = [
			"id_kredit" => $idKredit,
			"id_author" => auth()->user()->id,
			"id_rekening" => $idRekening,
			"nominal" => $nominalBayar,
			"keterangan" => $request->keterangan,
			"adm" => $adm,
			"created_at" => carbonNow(),
		];

		TransaksiKredit::insert($transaksiKredit);
		Kredit::updateStatusLunas($idKredit);
		Rekening::pengeluaran($idRekening, $nominalBayar + $adm);

		return redirect()->back();
	}

	public function show(Kredit $kredit)
	{
		//
	}


	public function edit(Kredit $kredit)
	{
		//
	}


	public function update(Request $request, Kredit $kredit)
	{
		//
	}


	public function destroy(Kredit $kredit)
	{
		//
	}
}
