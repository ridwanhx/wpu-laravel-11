<?php

namespace Database\Seeders;

use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // generate data menggunakan kelas factory sebanyak 10 buah data
        // User::factory(10)->create();

        // jalankan sebuah kelas factory (dalam kasus ini adalah kelas factory yang dipunyai oleh User), dan timpa setiap nilai-nilai field yang terdefinisikan sebagai berikut
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Jika tidak punya kelas factory
        // $ridwan = User::create([
        //     'name' => 'Muhamad Ridwan',
        //     'username' => 'ridwanhx',
        //     'email' => 'ridwan@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10)
        // ]);

        // Jika tidak punya kelas factory
        // $webDesign = Category::create([
        //     'category_name' => 'Web Design',
        //     'slug' => 'web-design'
        // ]);

        // Jika tidak punya kelas factory
        // Post::create([
        //     'title' => 'Judul Artikel 1',
        //     'author_id' => 1,
        //     'category_id' => 1,
        //     'slug' => 'judul-artikel-1',
        //     'body' => '    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero magni cum optio tenetur modi quidem. Sapiente cumque ad eligendi ipsa nihil earum numquam, magnam, labore a qui repellendus eaque laudantium!',
        // ]);

        // setelah masing-masing dibuatkan seeder
        $this->call([
            UserSeeder::class,
            CategorySeeder::class
        ]);

        // mengkombinasikan kelas factory dan seeder
        Post::factory(100)->recycle([   // jalankan kelas factory Post, sebelum di eksekusi, jalankan method recycle, yang kemudian untuk parameternya adalah berupa array sebagai berikut

            // sebelum masing-masing dibuatkan seeder
            // $ridwan,
            // User::factory(7)->create(), // jalankan kelas factory User, buatkan/generate sebanyak 7 data
            // $webDesign,
            // Category::factory(3)->create()  // Jalankan kelas factory Category, buatkan/generate sebanyak 3 data

            // setelah masing-masing dibuatkan seeder
            User::all(),    // jalankan method static all untuk memanggil semua yang ada di kelas ini
            Category::all()
        ])->create();   // generate kelas factory Post sebanyak 100 buah data.
    }
}
