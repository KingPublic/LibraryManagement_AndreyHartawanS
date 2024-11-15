<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class JurnalSeeder extends Seeder
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

        // Menambahkan 10 data jurnal menggunakan for loop
        for ($i = 0; $i < 10; $i++) {
            DB::table('jurnals')->insert([
                'title' => $faker->sentence(3), // Judul jurnal berupa kalimat acak
                'author' => $faker->name, // Nama penulis acak
                'publisher' => $faker->company, // Nama penerbit acak
                'publication_year' => $faker->year, // Tahun publikasi acak
                'description' => $faker->paragraph, // Deskripsi jurnal acak
            ]);
        }
    }
}
