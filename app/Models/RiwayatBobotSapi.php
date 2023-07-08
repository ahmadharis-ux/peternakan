<?php

namespace App\Models;

use App\Models\Sapi;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RiwayatBobotSapi extends Model
{

    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function sapi()
    {
        return $this->BelongsTo(Sapi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
