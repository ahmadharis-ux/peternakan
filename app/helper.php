<?php

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\MarkupSapi;
use Illuminate\Http\Request;
use App\Models\TransaksiDebit;
use App\Models\TransaksiKredit;
use App\Models\DetailPenjualanSapi;

function userPunyaTtd()
{
    return auth()->user()->foto_ttd !== null;
}

function carbonNow()
{
    return Carbon::now();
}

function getTimestamp()
{
    return str_replace(['-', ':', ' '], [""], carbonNow()->toDateTimeString());
}

function carbonToday()
{
    return str_replace('-', '/', Carbon::today()->toDateString());
}

function tanggalSekarang()
{
    return Carbon::now()->isoFormat('D MMMM, Y');
}

function getDetailPenjualanSapibyId($idSapi)
{
    return DetailPenjualanSapi::where('id_sapi', $idSapi)->first();
}

function getDataGrafikTransaksi(Request $request)
{
    $dt = Carbon::now();
    $awalBulan = $dt->startOfMonth()->toDateString();
    $akhirBulan = $dt->endOfMonth()->toDateString();

    $fromDate = $request->query('from_date') ?? $awalBulan;
    $toDate = $request->query('to_date') ?? $akhirBulan;

    $period = CarbonPeriod::create($fromDate, $toDate);
    $dateList = [];
    foreach ($period as $date) {
        $dateList[] = $date->toDateString();
    }

    $listTransaksiDebit = TransaksiDebit::whereBetween('created_at', [$fromDate, $toDate])->get();
    $listTransaksiKredit = TransaksiKredit::whereBetween('created_at', [$fromDate, $toDate])->get();

    $listTransaksiDebit->each(function ($trx) {
        $date = Carbon::create($trx->created_at)->toDateString();
        $trx->createdDate = $date;
    });

    $listTransaksiKredit->each(function ($trx) {
        $date = Carbon::create($trx->created_at)->toDateString();
        $trx->createdDate = $date;
    });

    $trxByDate = $listTransaksiDebit->groupBy('createdDate');
    $trxDebitByDate = $trxByDate->map(function ($trxList) {
        return $trxList->sum('nominal');
    });

    $trxByDate = $listTransaksiKredit->groupBy('createdDate');
    $trxKreditByDate = $trxByDate->map(function ($trxList) {
        return $trxList->sum('nominal');
    });

    $trxDebit = [];
    $trxKredit = [];

    foreach ($dateList as $date) {
        $trxDebit[] = $trxDebitByDate[$date] ?? 0;
        $trxKredit[] = $trxKreditByDate[$date] ?? 0;
    }

    $graphData = new stdClass();
    $graphData->fromDate = $fromDate;
    $graphData->toDate = $toDate;
    $graphData->dateList = json_encode($dateList);
    $graphData->trxKredit = collect($trxKredit);
    $graphData->trxDebit = collect($trxDebit);

    return $graphData;
}

function get_profil_pic()
{
    $pic = Storage::url(auth()->user()->foto_profil);
    $default = asset('assets/img/user-default.svg');

    if ($pic == "/storage/") {
        return $default;
    }

    return $pic;
}

function get_ttd()
{
    $pic = Storage::url(auth()->user()->foto_ttd);
    // $default = asset('assets/img/no-signature.svg');

    if ($pic == "/storage/") {
        return false;
    }

    return $pic;
}
