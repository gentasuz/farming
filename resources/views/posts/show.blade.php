<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>blog</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <x-app-layout>
        <-slot name="header">
            show
        </-slot>
        <body class="antialiased">
            <h1 class='title'>
                {{ $post->start_time }}
            </h1>
            <div Class='content'>
                <div class='content_post'>
                    <h2 Class='title'>{{ $post->start_time }}</h2>
                    <small>{{ $post->user->name }}</small>
                    <a href="">{{ $post->work->worktype }}</a>
                    <a href="">{{ $post->block->name }}</a>
                    <p Class='body'>{{ $post->comment }}</p>
                </div>
            </div>
            <div class='edit'>
                <a href="/posts/{{ $post->id }}/edit">edit</a>
            </div>
            <div class='footer'>
                <a href="/">戻る</a>
            </div>
        </body>
    </x-app-layout>
</html>