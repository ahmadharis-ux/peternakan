<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
	use HasFactory;

	public function debit()
	{
		return $this->hasMany(Debit::class);
	}

	public function kredit()
	{
		return $this->hasMany(Kredit::class);
	}


	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
