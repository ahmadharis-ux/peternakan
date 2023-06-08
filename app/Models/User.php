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
        'role',
        // 'debit',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'id_role');
    }



    public function rekening()
    {
        return $this->hasMany(Rekening::class,'id_author');
    }

    // ================================== per sapian
    public function pembelianSapi()
    {
        return $this->hasMany(PembelianSapi::class,'id_author');
    }

    public function penjualanSapi()
    {
        return $this->hasMany(PenjualanSapi::class,'id_author');
    }

    public function riwayatBobotSapi()
    {
        return $this->hasMany(RiwayatBobotSapi::class,'id_author');
    }

    public function jenisSapi()
    {
        return $this->hasMany(JenisSapi::class,'id_author');
    }


    // ================================== per pakanan
    public function pakan()
    {
        return $this->hasMany(Pakan::class, 'id_author');
    }

    public function pembelianPakan()
    {
        return $this->hasMany(PembelianPakan::class,'id_author');
    }

    public function pemakaianPakan()
    {
        return $this->hasMany(PemakaianPakan::class,'id_author');
    }


    // ================================== per kreditan
    public function kredit()
    {
        return $this->hasMany(Kredit::class,'id_author');
    }

    public function transaksiKredit()
    {
        return $this->hasMany(TransaksiKredit::class,'id_author');
    }

    public function fakturKredit()
    {
        return $this->hasMany(FakturKredit::class,'id_author');
    }

    // ================================== perdebitan
    public function debit()
    {
        return $this->hasMany(Debit::class, 'id_pihak_kedua','id_author');
    }

    public function transaksiDebit()
    {
        return $this->hasMany(TransaksiDebit::class,'id_author');
    }

    public function fakturDebit()
    {
        return $this->hasMany(FakturDebit::class,'id_author');
    }

    // ================================== per jurnalan
    public function kodeJurnal()
    {
        return $this->hasMany(KodeJurnal::class,'id_author');
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

    public static function getFullname($user)
    {
        $fullName = $user->nama_depan . " " . $user->nama_belakang;
        $user->fullname = $fullName;
    }
}
