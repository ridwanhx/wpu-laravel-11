<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}
