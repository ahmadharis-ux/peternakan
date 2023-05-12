<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDebit extends Model
{
    use HasFactory;


    public function Debit()
    {
        return $this->belongsTo(Debit::class, 'foreign_key', 'other_key');
    }

    public function Rekening()
    {
        return $this->belongsTo(Rekening::class, 'foreign_key', 'other_key');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'foreign_key', 'other_key');
    }
}
