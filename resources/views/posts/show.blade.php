<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
        <title>投稿詳細</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <x-app-layout>
        <body class="antialiased">
            <h1 class='title'>
                {{ $post->start_time }}の投稿詳細
            </h1>
            <div Class='content'>
                <div class='content_post'>
                    <h2 Class='title'>開始時間：{{ $post->start_time }}</h2>
                    <p>作業者：{{ $post->user->name }}</p>
                    <p href="">作業内容：{{ $post->work->worktype }}</p>
                    <p>
                    作業場所：
                    @foreach($post->blocks as $block)
                        {{ $block->name}}
                    @endforeach
                    </p>
                    <p Class='body'>コメント：{{ $post->comment }}</p>
                </div>
            </div>
            <div class='edit'>
                <a class="btn" href="/posts/{{ $post->id }}/edit">編集する</a>
            </div>
            <div class='footer'>
                <a class="btn" href="/">戻る</a>
            </div>
        </body>
    </x-app-layout>
</html>