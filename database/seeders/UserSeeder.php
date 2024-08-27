<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // generate data secara manual
        User::create([
            'name' => 'Muhamad Ridwan',
            'username' => 'ridwanhx',
            'email' => 'ridwan@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]);

        // generate data melalui kelas factory
        User::factory(4)->create(); // jalankan kelas factory User, buatkan/generate sebanyak 7 data
    }
}
