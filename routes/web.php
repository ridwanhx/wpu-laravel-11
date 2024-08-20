<?php

use Illuminate\Support\Facades\Route;

// ketika ada request akses ke halaman route (kondisi ketika setelah tanda slash tidak mengirimkan apa-apa atau "nama-aplikasi/")
Route::get('/', function () {
    // maka tampilkan/kembalikan view welcome / welcome.blade.php
    // return view('welcome');
    return view('home');
});

// ketika ada request akses ke halaman about (kondisi ketika setelah tanda slash terdapat about atau "nama-aplikasi/about")
Route::get('/about', function () {
    // maka tampilkan/kembalikan view about / about.blade.php
    // mengirim nilai melalui route
    return view('about', [
        'greetings' => 'Hola Guacamole',
        'framework' => 'laravel 11'
    ]);
});

// route ke halaman blog
Route::get('/blog', function () {
    return view('blog');
});

// route ke halaman contact
Route::get('/contact', function () {
    return view('contact');
});
