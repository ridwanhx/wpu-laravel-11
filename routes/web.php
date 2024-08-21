<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

// ketika ada request akses ke halaman route (kondisi ketika setelah tanda slash tidak mengirimkan apa-apa atau "nama-aplikasi/")
Route::get('/', function () {
    // maka tampilkan/kembalikan view welcome / welcome.blade.php
    // return view('welcome');
    return view('home', [
        // mengirim title sebagai slot ke halaman/view home
        'title' => 'Home Page'
    ]);
});

// ketika ada request akses ke halaman about (kondisi ketika setelah tanda slash terdapat about atau "nama-aplikasi/about")
Route::get('/about', function () {
    // maka tampilkan/kembalikan view about / about.blade.php
    // mengirim nilai melalui route
    return view('about', [
        'title' => 'About Page'
    ]);
});

// route ke halaman blog
Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog Page', 'posts' => [
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
    ]
    ]);
});

// menangani request ke halaman blog, yang request tersebut juga mengirimkan data. Implementasi wildcard
Route::get('/posts/{slug}', function($slug) { // kalau ada request ke halaman blog/posts, yang dimana request tersebut juga mengirimkan data, tangani data tersebut dengan menjadikannya wildcard, lalu buat function callback yang didalamnya menangkap nilai daripada wildcard tersebut.
    $posts = [
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
        ]
    ];

    // Fungsi Arr::first digunakan untuk mengambil elemen pertama dari array yang memenuhi kondisi tertentu.
    // Fungsi ini menerima dua parameter, diantaranya:
    // 1. Array yang akan dicari elemennya, dalam hal ini adalah $posts.
    // 2. Fungsi callback yang menentukan kondisi untuk mencari elemen.
    //    Callback ini menerima elemen saat ini ($post) dan akan mengembalikan true jika elemen memenuhi kondisi (dalam hal ini, jika 'id' pada post sama dengan $id yang diterima dari wildcard).
    // use merupakan fungsi pada laravel yang digunakan untuk mengambil variabel global(variabel yang posisinya berada diluar lingkup saat ini) - berkaitan dengan variable scope
    $post = Arr::first($posts, function($post) use($slug) {
        // Kembalikan elemen dengan 'id' yang sama dengan $id yang diterima dari URL.
        return $post['slug'] == $slug;
    });

    // kembalikan sebagai view dengan nama post
    // kirimkan variabel $post ke halaman/view post sebagai array dengan nama post
    return view('post', [
        'title' => 'Single Post',
        'post' => $post
    ]);
});

// akhir route ke halaman blog

// route ke halaman contact
Route::get('/contact', function () {
    return view('contact', [
        'title' => 'Contact Page'
    ]);
});
