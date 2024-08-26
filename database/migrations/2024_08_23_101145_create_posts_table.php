<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            // $table->string('author');

            // Episode 10: Eloquent Relationship
            // CARA 1
            // assign kolom author_id
            // $table->unsignedBigInteger('author_id');
            // jadikan kolom author_id sebagai foreign key yang bereferensi ke kolom id di tabel users
            // $table->foreign('author_id')->references('id')->on('users');

            // CARA 2
            // method foreignId melakukan definisi terkait nama kolom yang akan dijadikan foreign dan di set sebagai unsignedBigInteger.
            // method constrained melakukan referensi ke tabel yang akan dituju serta mendefinisikan nama index nya.
            // cara ini lebih ringkas dari cara pertama
            $table->foreignId('author_id')->constrained(
                table: 'users', indexName: 'posts_author_id'
            );
            $table->foreignId('category_id')->constrained(
                table: 'categories', indexName: 'posts_category_id'
            );

            $table->string('slug')->unique();
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
