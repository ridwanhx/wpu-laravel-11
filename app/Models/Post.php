<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    // Mendefinisikan field field apa saja yang boleh diisi
    protected $fillable = ['title', 'author', 'slug', 'body'];

    // Menjalankan eager loading secara default
    protected $with = ['author', 'category'];

    // deklarasi method yang mengembalikan nilai kembalian BelongsTo / nilai inverse one to many
    // tujuan dari penulisan kode ini adalah untuk memberikan relasi inverse antara post dengan user yang dimana dari skema yang sudah ditetapkan bahwasannya 1 post memiliki 1 author/user
    // maka dari itu, perlu dideklarasikan juga method one to many / hasMany dari model user ke model ini(post)
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // method untuk melakukan pencarian artikel berdasarkan keyword yang dikirimkan melalui request / form
    public function scopeSearching(Builder $query, array $searches): void
    {
        // buat kondisi untuk mengetahui saat ini sedang melakukan pencarian untuk data yang mana, apakah seluruh postingan atau untuk category/user, yang kemudian kondisi ini mengacu pada array di parameter diatas

        // method when() : mengeksekusi sebuah callback dimana kondisi dari argumen pertamanya bernilai true, method ini memungkinkan kita untuk mencari 2 hal sekaligus
        // pada kasus ini, kedua callback (query dan search) dituliskan sebagai parameter pada penulisan menggunakan arrow function
        $query->when( 
            // Periksa $searches apakah berisi search, jika tidak ada skip/kembalikan false.
            $searches['search'] ?? false, 
            // jalankan callback dibawah ini, jika $searchesnya berisi search
            fn ( $query, $search ) => 
            // serta jalankan query berikut
            $query->where('title', 'like', '%' . $search . '%')
        );

        $query->when(
            // Periksa $searches apakah berisi category, jika tidak skip saja
            $searches['category'] ?? false,
            // jalankan fungsi callback berikut jika kondisi sebelumnya true
            // parameter pertama pada function callback dibawah adalah query yang sedang dibangun,
            // parameter kedua adalah nilai category dari $searches
            fn ( $query, $category ) =>
            // whereHas() : u/ melakukan query terhadap relasi yang sudah dimiliki, digunakan untuk memeriksa apakah relasi tertentu (dalam hal ini category) memiliki data yang memenuhi kondisi yang diberikan
            // parameter pertama adalah nama relasinya, pada kelas ini terdapat relasi dari post ke category yang namanya adalah 'category'
            // parameter kedua adalah fungsi callback yang akan menerima query dan melakukan pencarian ke masing masing query untuk mencari data category berdasarkan slug
            $query->whereHas('category', fn ($query) => $query->where('slug', $category))
        );

        $query->when(
            $searches['author'] ?? false,
            fn ( $query, $author ) =>
            $query->whereHas('author', fn ($query) => $query->where('username', $author))
        );
    }
}
