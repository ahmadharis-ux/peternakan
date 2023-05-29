<?php

namespace App\Models;

use App\Models\User;
use App\Models\StockPakan;
use App\Models\PemakaianPakan;
use App\Models\DetailPemakaianPakan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pakan extends Model
{
	use HasFactory;

	function detailPembelianPakan()
	{
		return $this->hasMany(DetailPemakaianPakan::class, 'id_pakan');
	}
	function detailPemakaianPakan()
	{
		return $this->hasMany(DetailPemakaianPakan::class, 'id_pakan');
	}
	function pemakaianPakan()
	{
		return $this->hasMany(PemakaianPakan::class, 'id_pakan');
	}
	function stockPakan()
	{
		return $this->hasMany(StokPakan::class, 'id_pakan');
	}

	function user()
	{
		return $this->hasMany(User::class, 'id_pakan');
	}

}
