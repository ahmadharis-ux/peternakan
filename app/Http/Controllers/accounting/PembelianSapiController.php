<?php

namespace App\Http\Controllers\accounting;

use App\Models\Kas;
use App\Models\Sapi;
use App\Models\User;
use App\Models\Faktur;
use App\Models\Jurnal;
use App\Models\Kredit;
use App\Models\Rekening;
use App\Models\JenisSapi;
use Illuminate\Http\Request;
use App\Models\PembelianSapi;
use Illuminate\Support\Carbon;
use App\Models\TransaksiKredit;
use Illuminate\Support\Facades\DB;
use App\Models\DetailPembelianSapi;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Providers\PdfServiceProvider;
use Illuminate\Support\Facades\Storage;
use App\Models\OperasionalPembelianSapi;

class PembelianSapiController extends Controller
{
    public function index()
    {
        $idJurnalHutang = 1;
        $listKreditSapi = Kredit::where('id_jurnal', $idJurnalHutang)
            ->where('id_author', auth()->user()->id)
            ->get();



        $pageData = [
            'title' => "Buku - Hutang",
            'heading' => "Buku - Hutang",
            'active' => "buku",
            'listKreditSapi' => $listKreditSapi,
            'listSupplierSapi' => User::getSupplierSapi(),
        ];


        return view('accounting.pembelian_sapi.index', $pageData);
    }


    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $idJurnalHutang = 1;
            Kas::kreditBaru();
            $dataKreditBaru = [
                "id_kas" => Kas::idTerakhir(),
                "id_author" => auth()->user()->id,
                "id_pihak_kedua" => $request->id_pihak_kedua,
                "id_jurnal" => $idJurnalHutang,
                "keterangan" => $request->keterangan,
            ];

            Kredit::create($dataKreditBaru);

            $dataPembelianSapiBaru = [
                "id_author" => auth()->user()->id,
                "id_kredit" => Kredit::idTerakhir(),
            ];

            PembelianSapi::create($dataPembelianSapiBaru);

            DB::commit();
            Log::alert("pembelian sapi tersimpan");
            return redirect()->back()->with('success', "Pembelian sapi tersimpan");
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            return redirect()->back()->with('error', "Gagal menyimpan pembelian sapi");
        }
    }

    public function storeDetail(Request $request)
    {
        DB::beginTransaction();
        try {
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
                "keterangan" => $request->keterangan,
            ];

            DetailPembelianSapi::create($detailPembelianSapiBaru);

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

            Sapi::create($sapi);

            DB::commit();
            return redirect()->back()->with('success', "Detail tersimpan");
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            return redirect()->back()->with('error', "Gagal menyimpan detail");
        }
    }

    public function storeOperasional(Request $request)
    {
        DB::beginTransaction();
        try {
            $idPembelianSapi = $request->id_pembelian_sapi;
            $hargaOperasional = $request->harga;

            $operasionalPembelianSapiBaru = [
                'id_pembelian_sapi' => $idPembelianSapi,
                'harga' => $hargaOperasional,
                'keterangan' => $request->keterangan,

            ];

            OperasionalPembelianSapi::create($operasionalPembelianSapiBaru);

            $idKredit = PembelianSapi::find($idPembelianSapi)->kredit->id;

            Kredit::tambahNominal($idKredit, $hargaOperasional);
            Kredit::updateStatusLunas($idKredit);

            DB::commit();

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e);
            return redirect()->back()->with('error', "Gagal menyimpan Operasional");
        }
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

    public function invoice(PembelianSapi $pembelianSapi, Request $request)
    {
        $kredit = $pembelianSapi->kredit()->first();
        $timestamp = str_replace(['-', ':', ' '], [""], Carbon::now()->toDateTimeString());
        $nomorFaktur = "INV_" . $timestamp;

        $today = str_replace('-', '/', Carbon::today()->toDateString());

        $pageData = [
            "title" => "Invoice pembelian sapi $pembelianSapi->id",
            "pembelianSapi" => $pembelianSapi,
            "kredit" => $kredit,
            "subjek" => $request->subjek,
            "author" => auth()->user(),
            "nomorFaktur" => $nomorFaktur,
            "jatuhTempo" => str_replace('-', '/', $request->jatuh_tempo),
            "tanggalCetak" => $today,
            "tanggalDibuat" => $today,

        ];

        $fakturBaru = [
            "nomor_faktur" => $nomorFaktur,
            "subjek" => $request->subjek,
            "id_kredit" => $request->id_kredit,
            "id_author" => auth()->user()->id,
            "id_pihak_kedua" => $kredit->id_pihak_kedua,
            "page_data" => json_encode($pageData),
        ];

        if (!Faktur::create($fakturBaru)) {
            return back('/')->with('error', 'Gagal cetak faktur');
        }

        return view('accounting.pembelian_sapi.faktur', $pageData);
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
