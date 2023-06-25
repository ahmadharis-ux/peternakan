<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faktur extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = [
        'pihakKedua',
        'kredit',
        'debit',
    ];

    public function debit()
    {
        return $this->belongsTo(Debit::class, 'id_debit');
    }

    public function kredit()
    {
        return $this->belongsTo(Kredit::class, 'id_kredit');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_author');
    }

    public function pihakKedua()
    {
        return $this->belongsTo(User::class, 'id_pihak_kedua');
    }
}
