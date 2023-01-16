<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>blog</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body class="antialiased">
        <h1>Blog Name</h1>
        <div Class='posts'>
            @foreach($posts as $post)
            <h2 Class='title'>{{ $post->start_time }}</h2>
            <p Class='body'>{{ $post->comment }}</p>
            @endforeach
        </div>
    </body>
</html>
