<?php

namespace App\Models;

use App\Models\Jurnal;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KodeJurnal extends Model
{
	use HasFactory;

	public function user()
	{
		return $this->belongsTo(User::class,'id_author');
	}
	public function jurnal()
	{
		return $this->hasMany(Jurnal::class);
	}
}
