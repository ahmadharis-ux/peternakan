<?php

namespace App\Models;

use App\Models\User;
use App\Models\Debit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FakturDebit extends Model
{
	use HasFactory;

	public function debit()
	{
		return $this->belongsTo(Debit::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'id_user');
	}
}
