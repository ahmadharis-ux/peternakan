<?php

namespace App\Http\Controllers\accounting;

use App\Models\Kas;
use App\Models\User;
use App\Models\Kredit;
use App\Models\Rekening;
use Illuminate\Http\Request;
use App\Models\TransaksiKredit;
use App\Http\Controllers\Controller;

class TabunganController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	function index()
	{
		$idJurnalTabungan = 5;

		$pageData = [
			'title' => 'Buku - Tabungan',
			'heading' => 'Buku - Tabungan',
			'active' => 'buku',
			'listTabungan' => Kredit::where('id_jurnal', $idJurnalTabungan)->get(),
			'listOwner' => User::getOwner(),
			'listRekening' => Rekening::all(),
		];

		return view('accounting.tabungan.index', $pageData);
	}
	function store(Request $request)
	{

		$idJurnalTabungan = 5;
		$idOwner = User::find(1);
		Kas::kreditBaru();
		$today = Carbon::now();

		$dataKreditTabungan = [
			"id_kas" => Kas::idTerakhir(),
			"id_jurnal" => $idJurnalTabungan,
			"id_author" => auth()->user()->id,
			"id_pihak_kedua" => $request->id_pihak_kedua,
			"nominal" => $request->nominal,
			"keterangan" => $request->keterangan,
			"adm" => $request->adm,
			"lunas" => true,

		];

		// return $dataKreditTabungan;


		Kredit::create($dataKreditTabungan);
		$idRekening = $request->id_rekening;
		$nominalBayar = $request->nominal;
		$adm = $request->adm;

		$dataTransaksiKredit = [
			"id_author" => auth()->user()->id,
			"id_kredit" => Kredit::idTerakhir(),
			"id_rekening" => $idRekening,
			"nominal" => $nominalBayar,
			"keterangan" => $request->keterangan,
			"adm" => $adm,

		];

		TransaksiKredit::create($dataTransaksiKredit);
		Rekening::pengeluaran($idRekening, $nominalBayar + $adm);
		return redirect()->back();
	}
}
