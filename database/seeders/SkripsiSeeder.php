<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SkripsiSeeder extends Seeder
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

        // Menambahkan 10 data skripsi menggunakan for loop
        for ($i = 0; $i < 10; $i++) {
            DB::table('skripsis')->insert([
                'title' => $faker->sentence(5), // Judul skripsi berupa kalimat acak
                'author' => $faker->name, // Nama penulis acak
                'submit_year' => $faker->year, // Tahun serah skripsi acak
                'field_of_study' => $faker->word, // Bidang studi acak
                'abstract' => $faker->paragraph, // Abstrak skripsi acak
                'supervisor' => $faker->name, // Nama pembimbing acak
            ]);
        }
    }
}
