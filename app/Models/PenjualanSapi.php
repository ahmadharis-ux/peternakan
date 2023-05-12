<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanSapi extends Model
{

	use HasFactory;




	public function DetailPenjualanSapi()
	{
		return $this->hasMany(DetailPenjualanSapi::class);
	}

	public function OperasionalPenjualanSapi()
	{
		return $this->hasMany(OperasionalPenjualanSapi::class);
	}


	public function User()
	{
		return $this->belongsTo(User::class);
	}


	public function Debit()
	{
		return $this->belongsTo(Debit::class);
	}

  
}
