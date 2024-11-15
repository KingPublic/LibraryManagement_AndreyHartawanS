<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Membuat instance dari Faker
        $faker = Faker::create();

        // Menambahkan 10 data CD menggunakan for loop
        for ($i = 0; $i < 10; $i++) {
            DB::table('cds')->insert([
                'title' => $faker->sentence(3), // Judul CD berupa kalimat acak
                'artist' => $faker->name, // Nama artis atau band acak
                'release_date' => $faker->date, // Tanggal rilis CD acak
                'genre' => $faker->word, // Genre musik acak
            ]);
        }
    }
}
