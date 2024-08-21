<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | Laravel 11</title>
    <!-- tailwind cssq -->
    @vite('resources/css/app.css')

    <!-- alpine js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- font inter -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>
<body class="h-full">
    <div class="min-h-full">
        <!-- bagian navbar setelah komponen di definisikan -->
        <x-navbar></x-navbar>

        <!-- bagian header setelah komponen di definisikan -->
        <x-header>{{ $title }}</x-header>

        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <!-- Your content -->
             {{ $slot }}
            </div>
        </main>
    </div>

</body>
</html>