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
        $data = [
            ['name' => 'Hutang'],
            ['name' => 'Piutang'],
            ['name' => 'Pakan'],
            ['name' => 'Gaji'],
            ['name' => 'Tabungan'],
            ['name' => 'Prive'],
            ['name' => 'Amd'],
            ['name' => 'Operasional'],
            ['name' => 'Servis Mobil'],
        ];
        foreach ($data as $val) {
            Jurnal::insert([
                'name' => $val['name'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }
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
        $data = [
            ['name' => 'Diva', 'norek' => '123456', 'bank' => 'BCA'],
            ['name' => 'Shinta', 'norek' => '098765', 'bank' => 'BJB'],
        ];
        foreach ($data as $val) {
            Rekening::insert([
                'name' => $val['name'],
                'norek' => $val['norek'],
                'bank' => $val['bank'],
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now(),
            ]);
        }

        \App\Models\User::factory(20)->create();

        User::create([
            'name' => 'admin',
            'role_id' => 1,
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);
    }
}
