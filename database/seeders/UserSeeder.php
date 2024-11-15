<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Jalankan database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Hardcoded admin data
        User::create([
            'name' => 'admin',
            'username' => 'admin_username', // Tambahkan username di sini
            'email' => 'admin@example.com', // Ganti dengan email yang Anda inginkan
            'password' => Hash::make('password123'), // Ganti dengan password yang Anda inginkan
            'role' => 'admin'
        ]);

        // Jika Anda ingin menambahkan librarian juga, tambahkan seperti ini:
        User::create([
            'name' => 'librarian',
            'username' => 'librarian_username', // Tambahkan username di sini
            'email' => 'librarian@example.com', // Ganti dengan email librarian yang Anda inginkan
            'password' => Hash::make('password123'), // Password librarian
            'role' => 'librarian'
        ]);
    }
}
