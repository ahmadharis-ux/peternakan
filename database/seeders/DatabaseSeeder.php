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
use Database\Factories\SapiFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application"s database.
     *
     * @return void
     */
    public function run()
    {
        // ================================ ROLE dan USER
        $data = [
            ["name" => "Owner"],
            ["name" => "Admin"],
            ["name" => "Accounting"],
            ["name" => "Supplier pakans"],
            ["name" => "Supplier sapi"],
            ["name" => "Customer"],
            ["name" => "Pekerja"],
            ["name" => "User"],
        ];
        foreach ($data as $val) {
            Role::insert([
                "name" => $val["name"],
                "created_at" => Carbon::now(), "updated_at" => Carbon::now(),
            ]);
        }

        User::create(
            [
                "nama_depan" => "test",
                "nama_belakang" => "admin",
                "role_id" => 2,
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
                "role_id" => 1,
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
                "role_id" => 3,
                "email" => "accounting@gmail.com",
                "email_verified_at" => now(),
                "password" => Hash::make("password"),
                "remember_token" => Str::random(10),
            ],

        );

        \App\Models\User::factory(20)->create();

        // ================================

        // ============= REKENING
        $data = [
            ["nomor_rekening" => "12345", "id_user" => mt_rand(1, 8), "atas_nama" => "test_atas_nama", "bank" => "test_bank"],
            ["nomor_rekening" => "67890", "id_user" => mt_rand(1, 8), "atas_nama" => "test_atas_nama", "bank" => "test_bank"],
        ];
        foreach ($data as $val) {
            Rekening::insert([
                "nomor_rekening" => $val["nomor_rekening"],
                "id_user" => $val["id_user"],
                "atas_nama" => $val["atas_nama"],
                "bank" => $val["bank"],
                "created_at" => Carbon::now(), "updated_at" => Carbon::now(),
            ]);
        }
        // ======================


        // ====================== KODE JURNAL dan JURNAL
        $data = [
            ["kode" => "AB", "id_author" => 1],
            ["kode" => "CD", "id_author" => 2],
            ["kode" => "EF", "id_author" => 3],

        ];
        foreach ($data as $val) {
            KodeJurnal::insert([
                "kode" => $val["kode"],
                "id_author" => $val["id_author"],
            ]);
        }



        $data = [
            ["nama" => "Hutang", "id_kode_jurnal" => mt_rand(1, 3), "id_author" => mt_rand(1, 3)],
            ["nama" => "Piutang", "id_kode_jurnal" => mt_rand(1, 3), "id_author" => mt_rand(1, 3)],
            ["nama" => "Pakans", "id_kode_jurnal" => mt_rand(1, 3), "id_author" => mt_rand(1, 3)],
            ["nama" => "Gaji", "id_kode_jurnal" => mt_rand(1, 3), "id_author" => mt_rand(1, 3)],
            ["nama" => "Tabungan", "id_kode_jurnal" => mt_rand(1, 3), "id_author" => mt_rand(1, 3)],
            ["nama" => "Prive", "id_kode_jurnal" => mt_rand(1, 3), "id_author" => mt_rand(1, 3)],
            ["nama" => "Amd", "id_kode_jurnal" => mt_rand(1, 3), "id_author" => mt_rand(1, 3)],
            ["nama" => "Operasional", "id_kode_jurnal" => mt_rand(1, 3), "id_author" => mt_rand(1, 3)],
            ["nama" => "Servis Mobil", "id_kode_jurnal" => mt_rand(1, 3), "id_author" => mt_rand(1, 3)],
        ];
        foreach ($data as $val) {
            Jurnal::insert([
                "nama" => $val["nama"],
                "id_kode_jurnal" => $val["id_kode_jurnal"],
                "id_author" => $val["id_author"],
                "created_at" => Carbon::now(), "updated_at" => Carbon::now(),
            ]);
        }
        // ======================

        // ============== SATUAN PAKAN
        $data = [
            ["nama" => "kg"],
            ["nama" => "ikat"],
            ["nama" => "karung"],
        ];
        foreach ($data as $val) {
            SatuanPakan::insert([
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
            Pakan::insert([
                "nama" => $val["nama"],
                "id_author" => $val["id_author"],
            ]);
        }

        // ================= JENIS SAPI
        $data = [
            ["nama" => "Sapi hitam", "id_author" => mt_rand(1, 3)],
            ["nama" => "Sapi perah", "id_author" => mt_rand(1, 3)],
            ["nama" => "Sapi jadi-jadian", "id_author" => mt_rand(1, 3)],

        ];
        foreach ($data as $val) {
            JenisSapi::insert([
                "nama" => $val["nama"],
                "id_author" => $val["id_author"],
            ]);
        }

        // SAPI
        Sapi::factory(20)->create();
    }
}
