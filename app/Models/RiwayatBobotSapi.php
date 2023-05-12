<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatBobotSapi extends Model
{

	use HasFactory;

	public function Sapi()
	{
		return $this->BelongsTo(Sapi::class);
	}

	public function User()
	{
		return $this->BelongsTo(User::class);
	}

}
