<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debit extends Model
{
    use HasFactory;

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'foreign_key', 'other_key');
    }

    public function PihakKedua(): BelongsTo
    {
        return $this->belongsTo(User::class, 'foreign_key', 'other_key');
    }

    public function Jurnal(): BelongsTo
    {
        return $this->belongsTo(Jurnal::class, 'foreign_key', 'other_key');
    }

    public function TransaksiDebit(): HasMany
    {
        return $this->hasMany(TransaksiDebit::class, 'foreign_key', 'local_key');
    }


    public function FakturDebit(): HasMany
    {
        return $this->hasMany(FakturDebit::class, 'foreign_key', 'local_key');
    }
}
