<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sapi>
 */
class SapiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $kondisiSapi = [
            "Hidup", "Mati", "Sehat", "Gila"
        ];

        $statusSapi = ['ADA', 'DIBELI', 'SOLD'];

        $jenisKelamin = ['jantan', 'betina'];

        return [
            "id_jenis_sapi" => mt_rand(1, 3),
            "eartag" => substr(fake()->uuid(), 3, 3),
            "harga_pokok" => mt_rand(1000, 5000),
            "bobot" => mt_rand(299, 400),
            "kondisi" => $kondisiSapi[mt_rand(0, 3)],
            // "status" => $statusSapi[mt_rand(0, 2)],
            "status" => 'ADA',
            "jenis_kelamin" => $jenisKelamin[mt_rand(0, 1)],
        ];
    }
}
