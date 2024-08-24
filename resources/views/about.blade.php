<!-- Tampilan setelah dilakukan layout component -->
<x-layout>
    <!-- mengirimkan title yang didapatkan/telah didefinisikan dari route ke halaman ini untuk kemudian dikirimkan nilainya menggunakan komponen x-slot ke halaman layout -->
     <!-- singkatnya : membuat slot dengan nama title untuk kemudian dikirimkan ke halaman layout -->
     <x-slot:title>{{ $title }}</x-slot:title>
    <h3 class="text-xl">
    @php
        // deklarasi array
        $data = ['greeting' => 'Welcome to about page'];
        // operator null coalescing
        // mengecek apakah data di sebelah kiri tanda ??= adalah true/tidak null, jika ya eksekusi aksi tersebut, jika data null, eksekusi aksi di sebelah kanan.
        // berlaku untuk pengecekan tipe data bertipe array untuk kemudian diberikan aksi terkait kondisinya
        echo $data['greeting'] ??= 'Hello World!'
    @endphp
    </h3>
</x-layout>