<!-- Tampilan setelah dilakukan layout component -->
<x-layout>
    <!-- mengirimkan title yang didapatkan/telah didefinisikan dari route ke halaman ini untuk kemudian dikirimkan nilainya menggunakan komponen x-slot ke halaman layout -->
     <!-- singkatnya : membuat slot dengan nama title untuk kemudian dikirimkan ke halaman layout -->
     <x-slot:title>{{ $title }}</x-slot:title>

    <!-- artikels -->
    <!-- penulisan looping dengan blade directive looping -->
     <article class="py-8 max-w-screen-md">
        <h2 class="mb-1 text-3xl font-bold tracking-tight">{{ $post['title'] }}</h2>
        <div class="text-base text-gray-500">
            <a href="#">{{ $post['author'] }}</a> | {{ $post['created_at']->diffForHumans() }}
        </div>
        <p class="my-4 font-light">
            {{ $post['body'] }}
        </p>
        <a href="/posts/" class="font-medium text-blue-500 hover:underline">&laquo; Back to post</a>
     </article>
</x-layout>