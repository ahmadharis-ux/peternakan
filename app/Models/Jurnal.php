<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;

    public function Debit()
    {
        return $this->hasMany(Debit::class, 'foreign_key', 'local_key');
    }

    public function Kredit()
    {
        return $this->hasMany(Kredit::class, 'foreign_key', 'local_key');
    }


    public function User()
    {
        return $this->belongsTo(User::class, 'foreign_key', 'other_key');
    }
}
