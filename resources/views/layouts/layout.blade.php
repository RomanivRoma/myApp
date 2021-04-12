<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Post App - @yield('title')</title>
</head>
<body>
    <header>
        <div class="logo"><h3><a href="/"> My Posts App</a></h3></div>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="/posts">Posts</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        @yield('content')
    </div>
    <footer>
        Copyright 2021 Romaniv Roman
    </footer>
</body>
</html>
