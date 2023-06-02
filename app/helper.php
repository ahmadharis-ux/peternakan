<?php

use App\Models\DetailPenjualanSapi;
use App\Models\MarkupSapi;
use Carbon\Carbon;


function withFullname($userList)
{
    for ($i = 0; $i < sizeof($userList); $i++) {
        $user = $userList[$i];
        $fullName = $user->nama_depan . " " . $user->nama_belakang;

        $userList[$i]->fullname = $fullName;
    }

    return $userList;
}

function carbonNow()
{
    return Carbon::now();
}
function getDetailPenjualanSapibyId($idSapi){
    return DetailPenjualanSapi::where('id_sapi', $idSapi)->first();
}
