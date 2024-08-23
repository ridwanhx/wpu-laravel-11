<?php

// definisikan namespace untuk kelas
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Deklarasi kelas post
// EPS 09. Mendeklarasikan kelas post untuk kemudian mewarisi setiap perilaku yang ada di kelas model bawaan laravel
class Post extends Model
{
    // sekarang, tanpa harus mendefinisikan secara manual method all() dan find(), karena memang kedua method tersebut sudah diadaptasi oleh laravel menjadi method bawaan, bahkan untuk menampilkan semua data nya ke view, kita tidak perlu mendeklarasikan apa apa lagi sekarang

    // jika ada kondisi dimana nama kelas dan nama tabel tidak sama, cara untuk menanganinya adalah dengan mendefinisikan terlebih dahulu nama tabelnya sebagai property daripada kelas saat ini
    // protected $table = 'blog_posts';

    // secara default, laravel mengidentifikasikan bahwa primary key dari tabel adalah kolom id,
    // sama hal nya dengan kasus diatas, jika primary key nya bukan merujuk pada kolom id, perlu dilakukan pendefinisian terlebih dahulu
    // protected $primaryKey = 'post_id';

    // Mendefinisikan nama-nama field apa saja yang ada pada tabel yang boleh diisi / fillable
    protected $fillable = ['title', 'author', 'slug', 'body'];
}