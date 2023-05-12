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



    public function Rekening(): HasMany
    {
        return $this->hasMany(Rekening::class, 'foreign_key', 'local_key');
    }

    // ================================== per sapian
    public function PembelianSapi(): HasMany
    {
        return $this->hasMany(PembelianSapi::class, 'foreign_key', 'local_key');
    }

    public function PenjualanSapi(): HasMany
    {
        return $this->hasMany(PenjualanSapi::class, 'foreign_key', 'local_key');
    }

    public function RiwayatBobotSapi(): HasMany
    {
        return $this->hasMany(RiwayatBobotSapi::class, 'foreign_key', 'local_key');
    }

    public function JenisSapi(): HasMany
    {
        return $this->hasMany(JenisSapi::class, 'foreign_key', 'local_key');
    }


    // ================================== per pakanan
    public function Pakan(): HasMany
    {
        return $this->hasMany(Pakan::class, 'foreign_key', 'local_key');
    }

    public function PembelianPakan(): HasMany
    {
        return $this->hasMany(PembelianPakan::class, 'foreign_key', 'local_key');
    }

    public function PemakaianPakan(): HasMany
    {
        return $this->hasMany(PemakaianPakan::class, 'foreign_key', 'local_key');
    }


    // ================================== per kreditan
    public function Kredit(): HasMany
    {
        return $this->hasMany(Kredit::class, 'foreign_key', 'local_key');
    }

    public function TransaksiKredit(): HasMany
    {
        return $this->hasMany(TransaksiKredit::class, 'foreign_key', 'local_key');
    }

    public function FakturKredit(): HasMany
    {
        return $this->hasMany(FakturKredit::class, 'foreign_key', 'local_key');
    }

    // ================================== perdebitan
    public function Debit(): HasMany
    {
        return $this->hasMany(Debit::class, 'foreign_key', 'local_key');
    }

    public function TransaksiDebit(): HasMany
    {
        return $this->hasMany(TransaksiDebit::class, 'foreign_key', 'local_key');
    }

    public function FakturDebit(): HasMany
    {
        return $this->hasMany(FakturDebit::class, 'foreign_key', 'local_key');
    }

    // ================================== per jurnalan
    public function KodeJurnal(): HasMany
    {
        return $this->hasMany(KodeJurnal::class, 'foreign_key', 'local_key');
    }

    public function Jurnal(): HasMany
    {
        return $this->hasMany(Jurnal::class, 'foreign_key', 'local_key');
    }
}
