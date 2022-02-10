<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">
    <title>Film - @yield("title")</title>
</head>

<body>
    <header class="header">
        <div class="container header__contenido">
            <div class="header__logo">
                <a href="/"><img src="/img/285656_movie_icon.png" alt="imagen logo"></a>
                <p>Film</p>
            </div>
            <nav class="header__navegacion">
                <ul>
                    <li class=<?php echo "header__link" ?>><a href="/"> Home</a></li>
                    <li class=<?php echo "header__link" ?>><a href="/movie"> Movies</a></li>
                    <li class=<?php echo "header__link" ?>><a href="/movie/add"> Add Movie</a></li>
                    <li class=<?php echo "header__link" ?>><a href="/api"> Api</a></li>
                </ul>
            </nav>
        </div>
    </header>

    @yield("contenido")

    @yield("js")
    <script src="/js/app.js"></script>
</body>

</html>