<?php

namespace App\Models;

use App\Models\JenisSapi;
use App\Models\RiwayatBobotSapi;
use App\Models\DetailPenjualanSapi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sapi extends Model
{

    use HasFactory;
    protected $guarded = [
        'id'
    ];
    protected $with = [
        'jenisSapi',
        // 'markupSapi'
    ];

    public function jenisSapi()
    {
        return $this->belongsTo(JenisSapi::class, 'id_jenis_sapi');
    }
    public function markup()
    {
        return $this->hasMany(MarkupSapi::class, 'id_sapi');
    }

    public function markupSapi()
    {
        return $this->hasMany(MarkupSapi::class, 'id_sapi');
    }

    public function riwayatBobotSapi()
    {
        return $this->hasMany(RiwayatBobotSapi::class, 'id_sapi');
    }

    public function detailPenjualanSapi()
    {
        return $this->hasMany(DetailPenjualanSapi::class, 'id_sapi');
    }

    public static function getSapiTersedia()
    {
        return Sapi::where('status', 'ADA')->get();
    }


    public static function terjual($idSapi)
    {
        $sapi = Sapi::find($idSapi);
        $sapi->status = "DIBELI";
        $sapi->save();
    }
}
