<?php

namespace App\Models;

use App\Models\Jurnal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KodeJurnal extends Model
{
	use HasFactory;


	public function jurnal()
	{
		return $this->hasMany(Jurnal::class);
	}
}
