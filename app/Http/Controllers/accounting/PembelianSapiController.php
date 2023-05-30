<?php

namespace App\Http\Controllers\accounting;

use App\Models\Kas;
use App\Models\Sapi;
use App\Models\User;
use App\Models\Jurnal;
use App\Models\Kredit;
use App\Models\Rekening;
use App\Models\JenisSapi;
use Illuminate\Http\Request;
use App\Models\PembelianSapi;
use Illuminate\Support\Carbon;
use App\Models\TransaksiKredit;
use App\Models\DetailPembelianSapi;
use App\Http\Controllers\Controller;
use App\Models\OperasionalPembelianSapi;

class PembelianSapiController extends Controller
{
	public function index()
	{
		$idJurnalHutang = 1;

		$pageData = [
			'title' => "Buku - Hutang",
			'heading' => "Buku - Hutang",
			'active' => "buku",
			'listKreditSapi' => Kredit::where('id_jurnal', $idJurnalHutang)->get(),
			'listSupplierSapi' => User::getSupplierSapi(),
		];


		return view('accounting.pembelian_sapi.index', $pageData);
	}

	public function store(Request $request)
	{
		$idJurnalHutang = 1;
		$today = carbonNow();

		Kas::kreditBaru();
		$dataKreditBaru = [
			"id_kas" => Kas::idTerakhir(),
			"id_author" => auth()->user()->id,
			"id_pihak_kedua" => $request->id_pihak_kedua,
			"id_jurnal" => $idJurnalHutang,
			"keterangan" => $request->keterangan,
			"created_at" => $today,
		];

		Kredit::insert($dataKreditBaru);

		$dataPembelianSapiBaru = [
			"id_author" => auth()->user()->id,
			"id_kredit" => Kredit::idTerakhir(),
			"created_at" => $today,
		];

		PembelianSapi::insert($dataPembelianSapiBaru);
		return redirect()->back();;
	}

	public function storeDetail(Request $request)
	{
		$kiloan = $request->opsi_beli == 'kiloan';
		$idPembelianSapi = $request->id_pembelian_sapi;

		$idJenisSapi = $request->id_jenis_sapi;
		$hargaSapi = $request->total_harga;
		$bobot = $request->bobot;
		$eartag = $request->eartag;
		$jenisKelamin = $request->jenis_kelamin;


		$detailPembelianSapiBaru = [
			"id_pembelian_sapi" => $idPembelianSapi,
			"id_jenis_sapi" => $idJenisSapi,
			"jenis_kelamin" => $jenisKelamin,
			"eartag" => $eartag,
			"bobot" => $bobot,
			"kiloan" => $kiloan,
			"harga" => $hargaSapi,
			// "kondisi" => $request->kondisi,
			"keterangan" => $request->keterangan,
			"created_at" => carbonNow(),
		];

		DetailPembelianSapi::insert($detailPembelianSapiBaru);

		$idKredit = PembelianSapi::find($idPembelianSapi)->kredit->id;

		Kredit::tambahNominal($idKredit, $hargaSapi);
		Kredit::updateStatusLunas($idKredit);

		$sapi = [
			"id_jenis_sapi" => $idJenisSapi,
			"eartag" => $eartag,
			"harga_pokok" => $hargaSapi,
			"bobot" => $bobot,
			"jenis_kelamin" => $jenisKelamin,
		];

		Sapi::insert($sapi);

		return redirect()->back();
	}

	public function storeOperasional(Request $request)
	{
		$idPembelianSapi = $request->id_pembelian_sapi;
		$hargaOperasional = $request->harga;

		$operasionalPembelianSapiBaru = [
			'id_pembelian_sapi' => $idPembelianSapi,
			'harga' => $hargaOperasional,
			'keterangan' => $request->keterangan,
			'created_at' => carbonNow(),
		];

		OperasionalPembelianSapi::insert($operasionalPembelianSapiBaru);

		$idKredit = PembelianSapi::find($idPembelianSapi)->kredit->id;

		Kredit::tambahNominal($idKredit, $hargaOperasional);
		Kredit::updateStatusLunas($idKredit);

		return redirect()->back();
	}

	public function show($id)
	{
		$kredit = Kredit::find($id);
		$pembelianSapi = $kredit->pembelianSapi;
		$listDetailPembelian = $pembelianSapi->detailPembelianSapi;
		$listOperasionalPembelian = $pembelianSapi->operasionalPembelianSapi;
		$listRiwayatTransaksi = $kredit->transaksiKredit;

		$pageData = [
			'title' => "Buku - Hutang",
			'heading' => "Hutang baru",
			'active' => "buku",
			'kredit' => $kredit,
			'pembelianSapi' => $pembelianSapi,
			'listDetailPembelian' => $listDetailPembelian,
			'listOperasionalPembelian' => $listOperasionalPembelian,
			'listRiwayatTransaksi' => $listRiwayatTransaksi,
			'listJenisSapi' => JenisSapi::all(),
			'listRekening' => Rekening::all(),
		];

		return view('accounting.pembelian_sapi.detail', $pageData);
	}


	public function edit(PembelianSapi $pembelianSapi)
	{
		//
	}


	public function update(Request $request, PembelianSapi $pembelianSapi)
	{
		//
	}


	public function destroy(PembelianSapi $pembelianSapi)
	{
		//
	}
}
