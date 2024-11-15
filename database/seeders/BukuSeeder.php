<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BukuSeeder extends Seeder
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

        // Menambahkan 10 data buku menggunakan for loop
        for ($i = 0; $i < 10; $i++) {
            DB::table('bukus')->insert([
                'title' => $faker->sentence, // Menghasilkan kalimat acak sebagai judul
                'author' => $faker->name, // Menghasilkan nama acak sebagai penulis
                'publisher' => $faker->company, // Menghasilkan nama perusahaan acak sebagai penerbit
                'publication_year' => $faker->year, // Menghasilkan tahun acak
                'pages' => $faker->numberBetween(100, 500), // Menghasilkan angka halaman acak antara 100 dan 500
            ]);
        }
    }
}
