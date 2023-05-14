<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FakturDebit extends Model
{
    use HasFactory;

    public function debit()
    {
        return $this->belongsTo(Debit::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
