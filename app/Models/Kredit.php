<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kredit extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->belongsTo(User::class, 'foreign_key', 'other_key');
    }

    public function PihakKedua()
    {
        return $this->belongsTo(User::class, 'foreign_key', 'other_key');
    }

    public function Jurnal()
    {
        return $this->belongsTo(Jurnal::class, 'foreign_key', 'other_key');
    }

    public function TransaksiKredit()
    {
        return $this->hasMany(TransaksiKredit::class, 'foreign_key', 'local_key');
    }


    public function FakturKredit()
    {
        return $this->hasMany(FakturKredit::class, 'foreign_key', 'local_key');
    }
}
