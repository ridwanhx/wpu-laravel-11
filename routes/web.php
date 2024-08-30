<?php

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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
    // Lazy loading : mengeksekusi terlebih dahulu query (select * fron posts), dan hanya pada saat looping dijalankankah baru query ke users dan categories di eksekusi.
    // Eager loading : kebalikan dari lazy loading, eager mengeksekusi semua querynya langsung dari awal.

    // memanggil method with untuk menjalankan Eager loading
    // $posts = Post::with(['author', 'category'])->latest()->get();

    // tangkap data yang dikirimkan melalui form
    // dump(request('search'));

    // definisikan var yang menampung semua nilai order by data yang paling terbaru / latest
    // $posts = Post::latest();

    // berikan kondisi jika ada request yang dikirimkan melalui form
    // if (request('search')) {
        // berikan klausa where untuk mencari data berdasarkan keyword yang dikirimkan
        // $posts->where('title', 'like', '%' . request('search') . '%');
    // }

    return view('posts', ['title' => 'Blog Page', 'posts' => Post::latest()->searching(request(['search', 'category', 'author']))->get()]);
});

// menangani request ke halaman blog, yang request tersebut juga mengirimkan data. Implementasi wildcard
Route::get('/posts/{post:slug}', function(Post $post) { // Route ini mendefinisikan rute untuk URL /posts/{post:slug}.
    // {post:slug} adalah wildcard yang menangkap bagian URL yang sesuai dengan slug (misalnya, /posts/my-first-post).
    // 'post:slug' berarti kita ingin mencari entri di database berdasarkan kolom 'slug' dalam tabel yang sesuai dengan model 'Post'.
    // Laravel secara otomatis akan mencari Post yang memiliki slug yang cocok di database.
    // Hasil pencarian ini kemudian diinjeksikan ke dalam fungsi sebagai objek $post.
    // Dengan kata lain, $post akan menjadi objek dari model Post yang sesuai dengan slug yang diberikan.

    // kembalikan sebagai view dengan nama post
    // kirimkan variabel $post ke halaman/view post sebagai array dengan nama post
    return view('post', [
        'title' => 'Single Post',
        'post' => $post
    ]);
});

// rute ke halaman authors
Route::get('/author/{user:username}', function(User $user) {
    // Memanggil method load() untuk menjalankan lazy eager loading
    // $posts = $user->posts->load('author', 'category');

    return view('posts', [
        'title' => count($user->posts) . ' Articles by ' . $user->name,
        'posts' => $user->posts
    ]);
});

// rute ke halaman categories
Route::get('/categories/{category:slug}', function(Category $category) {
    // menjalankan lazy eager loading
    // $posts = $category->posts->load('category', 'author');

    return view('posts', [
        'title' => 'In category ' . $category->category_name,
        'posts' => $category->posts
    ]);
});

// akhir route ke halaman blog

// route ke halaman contact
Route::get('/contact', function () {
    return view('contact', [
        'title' => 'Contact Page'
    ]);
});
