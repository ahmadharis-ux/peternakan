<?php

namespace App\Models;

use App\Models\Sapi;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RiwayatBobotSapi extends Model
{
    use HasFactory;

    public function Sapi(): BelongsTo
    {
        return $this->BelongsTo(Sapi::class);
    }

    public function User(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
