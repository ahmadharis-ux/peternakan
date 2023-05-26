<?php

namespace App\Models;

use App\Models\Pakan;
use App\Models\SatuanPakan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StockPakan extends Model
{
	use HasFactory;
	protected $guarded = ['id'];

	function pakan()
	{
		return $this->belongsTo(Pakan::class);
	}
	function satuanPakan()
	{
		return $this->belongsTo(SatuanPakan::class);
	}
}
