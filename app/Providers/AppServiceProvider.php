<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // 
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Membuat agar semua model yang ada didalam aplikasi u/ mencegah/mendisable penulisan program secara lazy loading
        // merupakan sebuah exception yang dibuat untuk mencegah developer/pengembang dari aplikasi ini untuk melakukan penulisan kode program secara lazy loading
        Model::preventLazyLoading();

        // menambahkan paginator untuk memanipulasi styling pagination yang ada
        // Paginator::useBootstrapFive();  // misal jika ingin menggunakan bootstrap 5 sebagai styling untuk pagination nya, bisa dideklarasikan kode program sebagai berikut
    }
}
