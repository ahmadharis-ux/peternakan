<?php
function setFullname($userList)
{
    for ($i = 0; $i < sizeof($userList); $i++) {
        $user = $userList[$i];
        $fullName = $user->nama_depan . " " . $user->nama_belakang;

        $userList[$i]->fullname = $fullName;
    }

    return $userList;
}
