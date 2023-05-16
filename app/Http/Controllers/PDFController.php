<?php

namespace App\Http\Controllers;

use App\Models\Hutang;
use App\Models\Kas;
use App\Models\Pakan;
use App\Models\Pembayaran;
use App\Models\Rekening;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
	function fakturcust($id)
	{
		//ambil data
		set_time_limit(300);
		$data = Kas::where('id', $id)->with(['piutang', 'operasional', 'pembayaran', 'user'])->first();
		$date = Carbon::now();

		//kirim data ke view
		view()->share('data', $data);
		$pdf = PDF::loadview('accounting.invoice', [
			$data
		]);
		//set nama file
		$filename = 'Faktur-' . $data->id . '-' . $data->user->name . '.pdf';
		//unduh pdf
		return $pdf->download($filename);
	}
	// function fakturcust($id){
	//     set_time_limit(300);
	//     //ambildata
	//     $data = Kas::where('id',$id)->with(['piutang','operasional','pembayaran','user'])->first();
	//     //kirim data
	//     return view('accounting.hutang.pdf',[
	//         'data' => $data,
	//     ]);
	// }
	// function fakturcust($id){
	//     set_time_limit(300);
	//     //ambildata
	//     // $data = Kas::where('id',$id)->with(['piutang','operasional','pembayaran','user'])->first();
	//     $data = Kas::where('id',$id)->first();
	//     // $data = Kas::where('id', $id)->with([
	//     //     'piutang' => function ($query) {
	//     //         $query->select('hutang_id', 'bobot', 'total_harga');
	//     //     },
	//     //     'operasional' => function ($query) {
	//     //         $query->select('nominal', 'keterangan');
	//     //     },
	//     //     'pembayaran' => function ($query) {
	//     //         $query->select('debits');
	//     //     },
	//     //     'user' => function ($query) {
	//     //         $query->select('id', 'name','email');
	//     //     },
	//     // ])->first();

	//     //kirim data
	//     view()->share('data',$data);
	//     $pdf = PDF::loadview('accounting.customer.faktur',[
	//         $data
	//     ]);
	//     //unduh pdf
	//     return $pdf->download('faktur-customer.pdf');
	// }


}
