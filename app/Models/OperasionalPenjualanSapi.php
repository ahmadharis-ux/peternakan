<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperasionalPenjualanSapi extends Model
{

	use HasFactory;

	public function PenjualanSapi()
	{
		return $this->belongsTo(PenjualanSapi::class);
	}

}
