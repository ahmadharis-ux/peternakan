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


    protected $with = [
        'role'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }



    public function rekening()
    {
        return $this->hasMany(Rekening::class);
    }

    // ================================== per sapian
    public function pembelianSapi()
    {
        return $this->hasMany(PembelianSapi::class);
    }

    public function penjualanSapi()
    {
        return $this->hasMany(PenjualanSapi::class);
    }

    public function riwayatBobotSapi()
    {
        return $this->hasMany(RiwayatBobotSapi::class);
    }

    public function jenisSapi()
    {
        return $this->hasMany(JenisSapi::class);
    }


    // ================================== per pakanan
    public function pakan()
    {
        return $this->hasMany(Pakan::class);
    }

    public function pembelianPakan()
    {
        return $this->hasMany(PembelianPakan::class);
    }

    public function pemakaianPakan()
    {
        return $this->hasMany(PemakaianPakan::class);
    }


    // ================================== per kreditan
    public function kredit()
    {
        return $this->hasMany(Kredit::class);
    }

    public function transaksiKredit()
    {
        return $this->hasMany(TransaksiKredit::class);
    }

    public function fakturKredit()
    {
        return $this->hasMany(FakturKredit::class);
    }

    // ================================== perdebitan
    public function debit()
    {
        return $this->hasMany(Debit::class);
    }

    public function transaksiDebit()
    {
        return $this->hasMany(TransaksiDebit::class);
    }

    public function fakturDebit()
    {
        return $this->hasMany(FakturDebit::class);
    }

    // ================================== per jurnalan
    public function kodeJurnal()
    {
        return $this->hasMany(KodeJurnal::class);
    }

    public function jurnal()
    {
        return $this->hasMany(Jurnal::class);
    }

    public static function getSupplierSapi()
    {
        $listSupplierSapi = User::where('id_role', '5')->get();
        $listSupplierSapi = withFullname($listSupplierSapi);

        return  $listSupplierSapi;
    }

    public static function getSupplierPakan()
    {
        $listSupplierPakan = User::where('id_role', '4')->get();
        $listSupplierPakan = withFullname($listSupplierPakan);

        return  $listSupplierPakan;
    }

    public static function getPekerja()
    {
        $listSupplierPakan = User::where('id_role', '7')->get();
        $listSupplierPakan = withFullname($listSupplierPakan);

        return  $listSupplierPakan;
    }

    public static function getCustomer()
    {
        $listCustomer = User::where('id_role', '6')->get();
        $listCustomer = withFullname($listCustomer);

        return  $listCustomer;
    }
    public static function getOwner()
    {
        $listOwner = User::where('id_role', '1')->get();
        $listOwner = withFullname($listOwner);

        return  $listOwner;
    }
}
