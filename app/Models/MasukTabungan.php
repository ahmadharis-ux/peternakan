<?php

namespace App\Models;

use App\Models\Rekening;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MasukTabungan extends Model
{
	use HasFactory;

	public function rekening()
	{
		return $this->belongsTo(Rekening::class, 'id_rekening');
	}
}
