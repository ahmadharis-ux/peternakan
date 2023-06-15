<?php

use App\Models\DetailPenjualanSapi;
use App\Models\MarkupSapi;
use Carbon\Carbon;


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
