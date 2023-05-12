<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function Rekening()
    {
        return $this->hasMany(Rekening::class, 'foreign_key', 'local_key');
    }

    // ================================== per sapian
    public function PembelianSapi()
    {
        return $this->hasMany(PembelianSapi::class, 'foreign_key', 'local_key');
    }

    public function PenjualanSapi()
    {
        return $this->hasMany(PenjualanSapi::class, 'foreign_key', 'local_key');
    }

    public function RiwayatBobotSapi()
    {
        return $this->hasMany(RiwayatBobotSapi::class, 'foreign_key', 'local_key');
    }

    public function JenisSapi()
    {
        return $this->hasMany(JenisSapi::class, 'foreign_key', 'local_key');
    }


    // ================================== per pakanan
    public function Pakan()
    {
        return $this->hasMany(Pakan::class, 'foreign_key', 'local_key');
    }

    public function PembelianPakan()
    {
        return $this->hasMany(PembelianPakan::class, 'foreign_key', 'local_key');
    }

    public function PemakaianPakan()
    {
        return $this->hasMany(PemakaianPakan::class, 'foreign_key', 'local_key');
    }


    // ================================== per kreditan
    public function Kredit()
    {
        return $this->hasMany(Kredit::class, 'foreign_key', 'local_key');
    }

    public function TransaksiKredit()
    {
        return $this->hasMany(TransaksiKredit::class, 'foreign_key', 'local_key');
    }

    public function FakturKredit()
    {
        return $this->hasMany(FakturKredit::class, 'foreign_key', 'local_key');
    }

    // ================================== perdebitan
    public function Debit()
    {
        return $this->hasMany(Debit::class, 'foreign_key', 'local_key');
    }

    public function TransaksiDebit()
    {
        return $this->hasMany(TransaksiDebit::class, 'foreign_key', 'local_key');
    }

    public function FakturDebit()
    {
        return $this->hasMany(FakturDebit::class, 'foreign_key', 'local_key');
    }

    // ================================== per jurnalan
    public function KodeJurnal()
    {
        return $this->hasMany(KodeJurnal::class, 'foreign_key', 'local_key');
    }

    public function Jurnal()
    {
        return $this->hasMany(Jurnal::class, 'foreign_key', 'local_key');
    }
}
