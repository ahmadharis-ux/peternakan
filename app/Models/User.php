<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use App\Models\Pakan;
use App\Models\Kredit;
use App\Models\Rekening;
use App\Models\JenisSapi;
use App\Models\PembelianSapi;
use App\Models\PenjualanSapi;
use App\Models\PemakaianPakan;
use App\Models\PembelianPakan;
use App\Models\TransaksiKredit;
use App\Models\RiwayatBobotSapi;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id'
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
        return $this->hasMany(Rekening::class, 'id_author');
    }

    // ================================== per sapian
    public function pembelianSapi()
    {
        return $this->hasMany(PembelianSapi::class, 'id_author');
    }

    public function penjualanSapi()
    {
        return $this->hasMany(PenjualanSapi::class, 'id_author');
    }

    public function riwayatBobotSapi()
    {
        return $this->hasMany(RiwayatBobotSapi::class, 'id_author');
    }

    public function jenisSapi()
    {
        return $this->hasMany(JenisSapi::class, 'id_author');
    }


    // ================================== per pakanan
    public function pakan()
    {
        return $this->hasMany(Pakan::class, 'id_author');
    }

    public function pembelianPakan()
    {
        return $this->hasMany(PembelianPakan::class, 'id_author');
    }

    public function pemakaianPakan()
    {
        return $this->hasMany(PemakaianPakan::class, 'id_author');
    }


    // ================================== per kreditan
    public function kredit()
    {
        return $this->hasMany(Kredit::class, 'id_author');
    }

    public function transaksiKredit()
    {
        return $this->hasMany(TransaksiKredit::class, 'id_author');
    }

    public function fakturKredit()
    {
        return $this->hasMany(FakturKredit::class, 'id_author');
    }

    // ================================== perdebitan
    public function debit()
    {
        return $this->hasMany(Debit::class, 'id_pihak_kedua', 'id_author');
    }

    public function transaksiDebit()
    {
        return $this->hasMany(TransaksiDebit::class, 'id_author');
    }

    public function fakturDebit()
    {
        return $this->hasMany(FakturDebit::class, 'id_author');
    }

    // ================================== per jurnalan
    public function kodeJurnal()
    {
        return $this->hasMany(KodeJurnal::class, 'id_author');
    }

    public function jurnal()
    {
        return $this->hasMany(Jurnal::class);
    }

    public static function getSupplierSapi()
    {
        $listSupplierSapi = User::where('id_role', '5')->get();

        return  $listSupplierSapi;
    }

    public static function getSupplierPakan()
    {
        $listSupplierPakan = User::where('id_role', '4')->get();

        return  $listSupplierPakan;
    }

    public static function getPekerja()
    {
        $listSupplierPakan = User::where('id_role', '7')->get();

        return  $listSupplierPakan;
    }

    public static function getCustomer()
    {
        $listCustomer = User::where('id_role', '6')->get();

        return  $listCustomer;
    }
    public static function getOwner()
    {
        $listOwner = User::where('id_role', '1')->get();

        return  $listOwner;
    }

    public static function getFullname($user)
    {
        $fullName = $user->nama_depan . " " . $user->nama_belakang;
        $user->fullname = $fullName;
    }

    function fullname()
    {
        return $this->nama_depan . " " . $this->nama_belakang;
    }

    function get_profil_pic()
    {
        $pic = Storage::url($this->foto_profil);
        $default = asset('assets/img/user-default.svg');

        if ($pic == '/storage/') {
            return $default;
        }

        return $pic;
    }

    function get_ttd()
    {
        $pic = Storage::url($this->foto_ttd);

        if ($pic == '/storage/') {
            return false;
        }

        return $pic;
    }

    function userPunyaTtd()
    {
        return $this->foto_ttd !== null;
    }
}
