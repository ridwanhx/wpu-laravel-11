<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // deklarasi method yang mengembalikan nilai one to many / HasMany
    public function posts(): HasMany
    {
        // kembalikan nilai kembalian dari method hasMany yang menerima parameter yaitu kelas yang berelasi "many" dengan kelas saat ini (one author to many post)
        // perlu diberi parameter kedua yaitu kolom yang jadi foreign key nya
        // pada kasus kali ini perlu diberikan parameter kedua karena jika tidak laravel akan menganggap bahwa kolom foreign key yang dimaksud adalah kolom user_id
        return $this->hasMany(Post::class, 'author_id');
    }
}
