<?php

namespace App\Models;

use App\Models\User;
use App\Models\Debit;
use App\Models\Kredit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jurnal extends Model
{
    use HasFactory;

    protected $with = ['kodeJurnal'];


    public function debit()
    {
        return $this->hasMany(Debit::class);
    }

    public function kredit()
    {
        return $this->hasMany(Kredit::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kodeJurnal()
    {
        return $this->belongsTo(KodeJurnal::class, 'id_kode_jurnal');
    }
}
