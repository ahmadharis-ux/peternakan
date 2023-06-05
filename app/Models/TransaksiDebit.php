<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDebit extends Model
{
    use HasFactory;


    public function debit()
    {
        return $this->belongsTo(Debit::class,'id_debit');
    }

    public function rekening()
    {
        return $this->belongsTo(Rekening::class, 'id_rekening');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
