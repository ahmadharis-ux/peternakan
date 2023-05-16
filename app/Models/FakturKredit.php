<?php

namespace App\Models;

use App\Models\User;
use App\Models\Kredit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FakturKredit extends Model
{
	use HasFactory;

	public function kredit()
	{
		return $this->belongsTo(Kredit::class, 'id_kredit');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}
}
