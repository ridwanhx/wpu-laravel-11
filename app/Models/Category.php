<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    // definisikan beberapa field yang boleh diisi / fillable
    protected $fillable = ['category_name', 'slug'];

    // deklarasi method yang mengembalikan nilai one to many / HasMany
    public function posts(): HasMany
    {
        // kembalikan nilai kembalian dari method hasMany yang menerima parameter yaitu kelas yang berelasi "many" dengan kelas saat ini (one author to many post)
        // perlu diberi parameter kedua yaitu kolom yang jadi foreign key nya
        // pada kasus kali ini perlu diberikan parameter kedua karena jika tidak laravel akan menganggap bahwa kolom foreign key yang dimaksud adalah kolom user_id
        return $this->hasMany(Post::class, 'category_id');
    }
}
