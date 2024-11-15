<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KoranSeeder extends Seeder
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

        for ($i = 0; $i < 10; $i++) {
            DB::table('korans')->insert([
                'title' => $faker->sentence(3), // Judul koran berupa kalimat acak
                'publisher' => $faker->company, // Nama penerbit acak
                'publication_date' => $faker->date, // Tanggal publikasi acak
                'description' => $faker->paragraph, // Deskripsi koran acak
            ]);
        }
    }
}
