<?php

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Models\MarkupSapi;
use Illuminate\Http\Request;
use App\Models\TransaksiDebit;
use App\Models\TransaksiKredit;
use App\Models\DetailPenjualanSapi;

function withFullname($userList)
{
    for ($i = 0; $i < sizeof($userList); $i++) {
        $user = $userList[$i];
        $fullName = "$user->nama_depan $user->nama_belakang";

        $userList[$i]->fullname = $fullName;
    }

    return $userList;
}

function myId()
{
    return auth()->user()->id;
}

function getUserFullname($user)
{
    $fullName = "$user->nama_depan $user->nama_belakang";
    $user->fullname = $fullName;
    return $fullName;
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
