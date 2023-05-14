<?php

namespace App\Models;

use App\Models\StockPakan;
use App\Models\PemakaianPakan;
use App\Models\DetailPembelianPakan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SatuanPakan extends Model
{
	use HasFactory;
	function PemakaianPakan()
	{
		return $this->hasMany(PemakaianPakan::class, 'id_satuan_pakans');
	}
	function StockPakan()
	{
		return $this->hasMany(StockPakan::class, 'id_satuan_pakans');
	}
	function DetailPembelianPakan()
	{
		return $this->hasMany(DetailPembelianPakan::class, 'id_satuan_pakans');
	}
}
