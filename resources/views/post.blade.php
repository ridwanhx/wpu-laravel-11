<!-- Tampilan setelah dilakukan layout component -->
<x-layout>
    <!-- mengirimkan title yang didapatkan/telah didefinisikan dari route ke halaman ini untuk kemudian dikirimkan nilainya menggunakan komponen x-slot ke halaman layout -->
    <!-- singkatnya : membuat slot dengan nama title untuk kemudian dikirimkan ke halaman layout -->
    <x-slot:title>{{ $title }}</x-slot:title>

    <!-- artikels -->
    <!-- penulisan looping dengan blade directive looping -->
    {{-- <article class="py-8 max-w-screen-md">
        <h2 class="mb-1 text-3xl font-bold tracking-tight">{{ $post['title'] }}</h2>
        <div class="text-base text-gray-500">
            By <a href="/authors/{{ $post->author->username }}"
                class="hover:underline text-base text-gray-500">{{ $post->author->name }}</a> in <a
                href="/categories/{{ $post->category->id }}"
                class="hover:underline text-base text-gray-500">{{ $post->category->category_name }}</a> |
            {{ $post['created_at']->diffForHumans() }}
        </div>
        <p class="my-4 font-light">
            {{ $post['body'] }}
        </p>
        <a href="/posts/" class="font-medium text-blue-500 hover:underline">&laquo; Back to post</a>
    </article> --}}

    <!-- Menggunakan component tailwind - flowbite -->
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased mb-6">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
            <article
                class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <a href="/posts" class="font-medium text-sm text-blue-500">&laquo; Back to posts</a>
                    <address class="flex items-center my-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                alt="{{ $post->author->name }} avatar">
                            <div>
                                <a href="/posts?author={{ $post->author->username }}" rel="author"
                                    class="text-xl font-bold text-gray-900 dark:text-white">{{ $post->author->name }}
                                </a>
                                <div class="flex">
                                    <a href="/posts?category={{ $post->category->slug }}" class="me-2">
                                        <span
                                            class="bg-{{ $post->category->color }}-100 text-{{ $post->category->color }}-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                            {{ $post->category->category_name }}
                                        </span>
                                    </a>
                                    <span class="me-2 text-gray-500 dark:text-gray-400">|</span>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        {{ $post->created_at->diffForHumans() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $post->title }}</h1>
                </header>
                <p>{{ $post->body }}</p>
            </article>
        </div>
    </main>
</x-layout>
