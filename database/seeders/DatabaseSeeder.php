<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Tambahkan semua seeder
        $this->call([
            BukuSeeder::class,
            JurnalSeeder::class,
            KoranSeeder::class,
            CdSeeder::class,
            SkripsiSeeder::class,
            UserSeeder::class,
        ]);
    }
}
