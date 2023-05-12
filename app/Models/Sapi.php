<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sapi extends Model
{

	use HasFactory;


	public function JenisSapi()
	{
		return $this->belongsTo(JenisSapi::class);
	}

	public function RiwayatBobotSapi()
	{
		return $this->HasMany(RiwayatBobotSapi::class);
	}

	public function DetailPenjualanSapi()
	{
		return $this->HasMany(DetailPenjualanSapi::class);
	}

}
