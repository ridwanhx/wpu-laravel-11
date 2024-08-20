<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | Laravel 11</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="about-page">
    <div class="navbar navbar-fixed">
        <div class="container">
            <ul>
                <li><a href="/" class="nav-item">Home</a></li>
                <li><a href="/blog" class="nav-item">Blog</a></li>
                <li><a href="/about" class="nav-item">About</a></li>
                <li><a href="/contact" class="nav-item">Contact</a></li>
            </ul>
        </div>
    </div>

    <div class="container mt-4">
        <h1>Halaman About</h1>
        <img src="img/img-1.jpg" alt="image 1" width="200px">
        <p>
            <!-- menampilkan nilai pada variabel menggunakan blade templating -->
            <span class="text-capitalize">{{ $greetings }}</span>, I'm using <span class="text-capitalize"><?= $framework; ?></span> right now!</p>
    </div>
</body>
</html>