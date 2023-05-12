<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualanSapi extends Model
{

	use HasFactory;

	public function Sapi(): Has
	{
		return $this->has(Sapi::class);
	}

	public function PenjualanSapi()
	{
		return $this->belongsTo(PenjualanSapi::class);
	}

}
