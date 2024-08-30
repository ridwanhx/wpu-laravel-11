<!-- melakukan debugging vardump & die -->
<!-- dd($title) -->

<!-- Tampilan setelah dilakukan layout component -->
<x-layout>
    <!-- mengirimkan title yang didapatkan/telah didefinisikan dari route ke halaman ini untuk kemudian dikirimkan nilainya menggunakan komponen x-slot ke halaman layout -->
    <!-- singkatnya : membuat slot dengan nama title untuk kemudian dikirimkan ke halaman layout -->
    <x-slot:title>{{ $title }}</x-slot:title>

    <h3 class="text-xl">Hello World, this is my home page !</h3>
</x-layout>
