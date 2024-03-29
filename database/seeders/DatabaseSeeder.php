<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\JenisSapi;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\Sapi;
use App\Models\User;
use App\Models\Pakan;
use App\Models\Jurnal;
use App\Models\Rekening;
use App\Models\KodeJurnal;
use App\Models\SatuanPakan;
use App\Models\StokPakan;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    private function seedRoleAndUser()
    {
        // ================================ ROLE dan USER
        $data = [
            ["nama" => "Owner"],
            ["nama" => "Admin"],
            ["nama" => "Accounting"],
            ["nama" => "Supplier pakan"],
            ["nama" => "Supplier sapi"],
            ["nama" => "Customer"],
            ["nama" => "Pekerja"],
            ["nama" => "User"],
        ];
        foreach ($data as $val) {
            Role::create([
                "nama" => $val["nama"],
                "updated_at" => Carbon::now(),
            ]);
        }

        User::create(
            [
                "nama_depan" => "Super",
                "nama_belakang" => "Admin",
                "id_role" => 2,
                "email" => "admin@gmail.com",
                "email_verified_at" => now(),
                "password" => Hash::make("password"),
                "remember_token" => Str::random(10),
            ],
        );

        User::create(
            [
                "nama_depan" => "test",
                "nama_belakang" => "owner",
                "id_role" => 1,
                "email" => "owner@gmail.com",
                "email_verified_at" => now(),
                "password" => Hash::make("password"),
                "remember_token" => Str::random(10),
            ],
        );

        User::create(
            [
                "nama_depan" => "test",
                "nama_belakang" => "accounting",
                "id_role" => 3,
                "email" => "accounting@gmail.com",
                "email_verified_at" => now(),
                "password" => Hash::make("password"),
                "remember_token" => Str::random(10),
            ],

        );


        // User::factory(20)->create();

        for ($i = 0; $i < 3; $i++) {
            User::create(
                [
                    "nama_depan" => "customer",
                    "nama_belakang" => $i + 1,
                    "id_role" => 6,
                    "email" => "customer" . $i + 1 . "@gmail.com",
                    "email_verified_at" => now(),
                    "password" => Hash::make("password"),
                    "remember_token" => Str::random(10),
                ],

            );
        }

        for ($i = 0; $i < 3; $i++) {
            User::create(
                [
                    "nama_depan" => "ssapi",
                    "nama_belakang" => $i + 1,
                    "id_role" => 5,
                    "email" => "supplier_sapi" . $i + 1 . "@gmail.com",
                    "email_verified_at" => now(),
                    "password" => Hash::make("password"),
                    "remember_token" => Str::random(10),
                ],

            );
        }

        for ($i = 0; $i < 3; $i++) {
            User::create(
                [
                    "nama_depan" => "spakan",
                    "nama_belakang" => $i + 1,
                    "id_role" => 4,
                    "email" => "supplier_pakan" . $i + 1 . "@gmail.com",
                    "email_verified_at" => now(),
                    "password" => Hash::make("password"),
                    "remember_token" => Str::random(10),
                ],

            );
        }
    }

    private function seedRekening()
    {
        $data = [
            // ["nomor_rekening" => "323353235", "id_user" => mt_rand(1, 3), "atas_nama" => "Aiman Witjaksono", "bank" => "BCA"],
            // ["nomor_rekening" => "67890", "id_user" => mt_rand(1, 3), "atas_nama" => "Andi Odang", "bank" => "BRI"],

            ["nomor_rekening" => "---", "id_user" => mt_rand(1, 3), "atas_nama" => "CASH", "bank" => "---"],
        ];
        foreach ($data as $val) {
            Rekening::create([
                "nomor_rekening" => $val["nomor_rekening"],
                // "id_user" => $val["id_user"],
                "atas_nama" => $val["atas_nama"],
                "bank" => $val["bank"],
                "saldo" => 1000,
                "updated_at" => Carbon::now(),
            ]);
        }
    }

    private function seedKodeJurnalAndJurnal()
    {
        $data = [
            ["kode" => "AB", "id_author" => 1],
            ["kode" => "CD", "id_author" => 2],
            ["kode" => "EF", "id_author" => 3],

        ];
        foreach ($data as $val) {
            KodeJurnal::create([
                "kode" => $val["kode"],
                "id_author" => $val["id_author"],
            ]);
        }



        $data = [
            ["nama" => "Hutang", "id_kode_jurnal" => mt_rand(1, 3), "id_author" => mt_rand(1, 3)],
            ["nama" => "Piutang", "id_kode_jurnal" => mt_rand(1, 3), "id_author" => mt_rand(1, 3)],
            ["nama" => "Pakan", "id_kode_jurnal" => mt_rand(1, 3), "id_author" => mt_rand(1, 3)],
            ["nama" => "Gaji", "id_kode_jurnal" => mt_rand(1, 3), "id_author" => mt_rand(1, 3)],
            ["nama" => "Tabungan", "id_kode_jurnal" => mt_rand(1, 3), "id_author" => mt_rand(1, 3)],
            ["nama" => "Prive", "id_kode_jurnal" => mt_rand(1, 3), "id_author" => mt_rand(1, 3)],
            ["nama" => "Amd", "id_kode_jurnal" => mt_rand(1, 3), "id_author" => mt_rand(1, 3)],
            ["nama" => "Operasional", "id_kode_jurnal" => mt_rand(1, 3), "id_author" => mt_rand(1, 3)],
            ["nama" => "Servis Mobil", "id_kode_jurnal" => mt_rand(1, 3), "id_author" => mt_rand(1, 3)],
        ];
        foreach ($data as $val) {
            Jurnal::create([
                "nama" => $val["nama"],
                "id_kode_jurnal" => $val["id_kode_jurnal"],
                "id_author" => $val["id_author"],
                "updated_at" => Carbon::now(),
            ]);
        }
    }

    private function seedSatuanPakanAndPakan()
    {
        $data = [
            ["nama" => "kg"],
            ["nama" => "ikat"],
            ["nama" => "karung"],
        ];
        foreach ($data as $val) {
            SatuanPakan::create([
                "nama" => $val["nama"]
            ]);
        }

        // ============== PAKAN
        $data = [
            ["nama" => "Ampas bir", "id_author" => mt_rand(1, 3)],
            ["nama" => "Jerami", "id_author" => mt_rand(1, 3)],
            ["nama" => "Kanibal", "id_author" => mt_rand(1, 3)],

        ];
        foreach ($data as $val) {
            Pakan::create([
                "nama" => $val["nama"],
                "id_author" => $val["id_author"],
            ]);
        }
    }


    private function seedJenisSapiAndSapi()
    {
        $data = [
            ["nama" => "Limosin", "id_author" => mt_rand(1, 3)],
            ["nama" => "Madura", "id_author" => mt_rand(1, 3)],
            ["nama" => "dermen", "id_author" => mt_rand(1, 3)],

        ];
        foreach ($data as $val) {
            JenisSapi::create([
                "nama" => $val["nama"],
                "id_author" => $val["id_author"],
            ]);
        }

        Sapi::factory(5)->create();
    }

    function seedStokPakan()
    {

        for ($i = 0; $i < 10; $i++) {
            StokPakan::create([
                "id_pakan" => mt_rand(0, 2),
                "id_satuan_pakan" => 1,
                "harga" => mt_rand(2999, 10000),
                "stok" => mt_rand(10, 100),
            ]);
        }
    }

    public function run()
    {
        $this->seedRoleAndUser();
        $this->seedRekening();
        $this->seedKodeJurnalAndJurnal();
        $this->seedSatuanPakanAndPakan();
        $this->seedJenisSapiAndSapi();
        // $this->seedStokPakan();
    }
}
