<?php

// definisikan namespace untuk kelas
namespace App\Models;
use Illuminate\Support\Arr;

// Deklarasi kelas post
class Post
{
    // Deklarasi method static all
    public static function all()
    {
        // kembalikan semua data array
        return [
            [
                'id' => 1,
                'slug' => 'judul-artikel-1',
                'judul' => 'Judul Artikel 1',
                'author' => 'Muhamad Ridwan', 
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor quo ducimus alias, facilis ratione doloremque, repellendus dolore minus dolorem, nam et suscipit. Minus incidunt asperiores repellendus quae impedit perferendis fugiat.'
            ],
            [
                'id' => 2,
                'slug' => 'judul-artikel-2',
                'judul' => 'Judul Artikel 2',
                'author' => 'Muhamad Ridwan', 
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa optio, delectus, odio eaque voluptatem quaerat aspernatur autem provident quo incidunt fugiat in ipsum. Autem error ex neque, adipisci culpa unde?'
            ],
        ];
    }

    // pastikan yang dikembalikan oleh method ini / return type nya adalah array
    public static function find($slug): array
    {
        // penulisan sebelum diterapkan arrow function
        // cari elemen pertama pada array yang dilakukan pencocokan data dari data array yang dikembalikan method all() / posts
        // 
        // return Arr::first(static::all(), function($post) use($slug) {
        //     // Kembalikan elemen dengan 'slug' yang sama dengan $id yang diterima dari URL kemudian dijadikan parameter di method ini.
        //     return $post['slug'] == $slug;
        // });

        // penulisan menggunakan arrow function PHP v.8
        // fungsi fn merupakan salah satu skema dalam penulisan arrow function yang didalamnya menampung parameter post untuk merepresentasikan satu buah post
        // tanda "=>" untuk merepresentasikan arrow function nya, kemudian dituliskan return valuenya "dalam kasus ini adalah slug".
        // sebenarnya pada penulisan menggunakan arrow function ini hanya untuk menggantikan fungsi daripada function callback sebelumnya, yang dimana fungsi dan esensi daripadanya masih tetap sama
        $post = Arr::first(static::all(), fn ($post) => $post['slug'] == $slug);

        // jika post bernilai NULL
        if ( !$post ) {
            // berikan 404
            abort(404);
        }

        // kembalikan nilai yang dihasilkan variabel post
        return $post;
    }
}