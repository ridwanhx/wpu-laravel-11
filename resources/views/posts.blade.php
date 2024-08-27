<!-- Tampilan setelah dilakukan layout component -->
<x-layout>
    <!-- mengirimkan title yang didapatkan/telah didefinisikan dari route ke halaman ini untuk kemudian dikirimkan nilainya menggunakan komponen x-slot ke halaman layout -->
     <!-- singkatnya : membuat slot dengan nama title untuk kemudian dikirimkan ke halaman layout -->
     <x-slot:title>{{ $title }}</x-slot:title>

    <!-- artikels -->

    <!-- penulisan looping dengan blade directive looping -->
    @foreach( $posts as $post )
     <article class="py-8 max-w-screen-md border-b border-gray-500">
        <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
            <h2 class="mb-1 text-3xl font-bold tracking-tight">{{ $post['title'] }}</h2>
        </a>
        <!-- jika formatnya ingin seperti sebelumnya: 9 August 2024 -->
        <!-- contoh penulisan: $post['created_at']->format('j F Y') -->
        <div>
            <!-- contoh penulisan dengan carbon: fitur pada laravel untuk manipulasi tanggal -->
            By <a href="/authors/{{ $post->author->username }}" class="hover:underline text-base text-gray-500">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->id }}" class="hover:underline text-base text-gray-500">{{ $post->category->category_name }}</a> | {{ $post['created_at']->diffForHumans() }}
        </div>
        <p class="my-4 font-light">
            <!-- fungsi yang ada di laravel, untuk manipulasi string "limit" -->
            <!-- menerima 2 buah parameter, string yang akan dilakukan limit, dan jumlah limit karakternya -->
            {{ Str::limit($post['body'], 100) }}
        </p>
        <a href="/posts/{{ $post['slug'] }}" class="font-medium text-blue-500 hover:underline">Read more &raquo;</a>
     </article>
     @endforeach
</x-layout>