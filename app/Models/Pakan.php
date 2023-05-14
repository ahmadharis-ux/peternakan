<?php

namespace App\Models;

use App\Models\StockPakan;
use App\Models\PemakaianPakan;
use App\Models\DetailPemakaianPakan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pakan extends Model
{
	use HasFactory;

	function DetailPembelianPakan()
	{
		return $this->hasMany(DetailPemakaianPakan::class, 'id_pakans');
	}
	function DetailPemakaianPakan()
	{
		return $this->hasMany(DetailPemakaianPakan::class, 'id_pakans');
	}
	function PemakaianPakan()
	{
		return $this->hasMany(PemakaianPakan::class, 'id_pakans');
	}
	function StockPakan()
	{
		return $this->hasMany(StockPakan::class, 'id_pakans');
	}

	function User()
	{
		return $this->hasMany(User::class, 'id_pakans');
	}
}
