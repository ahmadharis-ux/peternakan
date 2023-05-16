<?php

namespace App\Models;

use App\Models\User;
use App\Models\MasukTabungan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rekening extends Model
{
	use HasFactory;

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}

	public function masukTabungan()
	{
		return $this->hasMany(MasukTabungan::class);
	}
}
