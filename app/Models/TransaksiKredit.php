<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiKredit extends Model
{
    use HasFactory;


    public function kredit()
    {
        return $this->belongsTo(Kredit::class, 'id_kredit');
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
