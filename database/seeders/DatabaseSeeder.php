<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Jurnal;
use App\Models\Rekening;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $data = [
        //     ['name' => 'Hutang'],
        //     ['name' => 'Piutang'],
        //     ['name' => 'Pakan'],
        //     ['name' => 'Gaji'],
        //     ['name' => 'Tabungan'],
        //     ['name' => 'Prive'],
        //     ['name' => 'Amd'],
        //     ['name' => 'Operasional'],
        //     ['name' => 'Servis Mobil'],
        // ];
        // foreach ($data as $val) {
        //     Jurnal::insert([
        //         'name' => $val['name'],
        //         'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
        //     ]);
        // }


        // ============= REKENING
        $data = [
            ["nomor" => '12345', "id_user" => mt_rand(1, 8), "atas_nama" => "test_atas_nama", "bank" => "test_bank"],
            ["nomor" => '67890', "id_user" => mt_rand(1, 8), "atas_nama" => "test_atas_nama", "bank" => "test_bank"],
        ];
        foreach ($data as $val) {
            Rekening::insert([
                'nomor' => $val['nomor'],
                'id_user' => $val['id_user'],
                'atas_nama' => $val['atas_nama'],
                'bank' => $val['bank'],
                // 'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
        // ======================



        // ================================ ROLE dan USER
        $data = [
            ['name' => 'Owner'],
            ['name' => 'Admin'],
            ['name' => 'Accounting'],
            ['name' => 'Supplier Pakan'],
            ['name' => 'Supplier Sapi'],
            ['name' => 'Customer'],
            ['name' => 'Pekerja'],
            ['name' => 'User'],
        ];
        foreach ($data as $val) {
            Role::insert([
                'name' => $val['name'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }

        \App\Models\User::factory(20)->create();
        User::create(
            [
                'nama_depan' => 'test',
                'nama_belakang' => 'admin',
                'role_id' => 2,
                'email' => 'admin@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('admin'),
                'remember_token' => Str::random(10),
            ],
            [
                'nama_depan' => 'test',
                'nama_belakang' => 'accounting',
                'role_id' => 3,
                'email' => 'accounting@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('accounting'),
                'remember_token' => Str::random(10),
            ],
            [
                'nama_depan' => 'test',
                'nama_belakang' => 'owner',
                'role_id' => 1,
                'email' => 'owner@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('owner'),
                'remember_token' => Str::random(10),
            ],
        );
        // ================================
    }
}
