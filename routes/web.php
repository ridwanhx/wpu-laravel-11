<?php

use App\Models\Post;
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
    return view('posts', ['title' => 'Blog Page', 'posts' => Post::all()]);
});

// menangani request ke halaman blog, yang request tersebut juga mengirimkan data. Implementasi wildcard
Route::get('/posts/{slug}', function($slug) { // kalau ada request ke halaman blog/posts, yang dimana request tersebut juga mengirimkan data, tangani data tersebut dengan menjadikannya wildcard, lalu buat function callback yang didalamnya menangkap nilai daripada wildcard tersebut.
    $posts = Post::all();

    // Fungsi Arr::first digunakan untuk mengambil elemen pertama dari array yang memenuhi kondisi tertentu.
    // Fungsi ini menerima dua parameter, diantaranya:
    // 1. Array yang akan dicari elemennya, dalam hal ini adalah $posts.
    // 2. Fungsi callback yang menentukan kondisi untuk mencari elemen.
    //    Callback ini menerima elemen saat ini ($post) dan akan mengembalikan true jika elemen memenuhi kondisi (dalam hal ini, jika 'id' pada post sama dengan $id yang diterima dari wildcard).
    // use merupakan fungsi pada laravel yang digunakan untuk mengambil variabel global(variabel yang posisinya berada diluar lingkup saat ini) - berkaitan dengan variable scope
    $post = Post::find($slug);

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
