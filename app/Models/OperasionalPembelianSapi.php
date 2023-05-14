<?php

namespace App\Models;

use App\Models\PembelianSapi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OperasionalPembelianSapi extends Model
{
	use HasFactory;


	public function pembelianSapi()
	{
		return $this->belongsTo(PembelianSapi::class);
	}
}
