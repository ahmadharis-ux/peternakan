<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kredit extends Model
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

    public function TransaksiKredit(): HasMany
    {
        return $this->hasMany(TransaksiKredit::class, 'foreign_key', 'local_key');
    }


    public function FakturKredit(): HasMany
    {
        return $this->hasMany(FakturKredit::class, 'foreign_key', 'local_key');
    }
}
