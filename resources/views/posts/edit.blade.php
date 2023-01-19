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
            edit  
        </-slot>
        <body class="antialiased">
            <h1>Blog Name</h1>
            <form action='/posts/{{ $post->id }}' method="POST">
                @csrf
                @method('PUT')
                <div class='title'>
                    <h2>開始時間</h2>
                    <input type='datetime-local' name=post[start_time] value={{ $post->start_time}}>
                    <h2>終了時間</h2>
                    <input type='datetime-local' name=post[end_time] value={{ $post->start_time}}>
                </div>
                <div class='body'>
                    <h2>comment</h2>
                    <textarea name="post[comment]" placeholder="サンプルテキスト">{{ $post->comment }}</textarea>
                </div>
                <div class="category">
                    <h2>Worktype</h2>
                    <select name="post[work_id]">
                        @foreach($works as $work)
                            <option value="{{ $work->id }}">{{ $work->worktype }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="category">
                    <h2>Block</h2>
                    <select name="post[block_id]">
                        @foreach($blocks as $block)
                            <option value="{{ $block->id }}">{{ $block->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" value="update">
            </form>
            <div class='footer'>
                <a href="/posts/{{ $post->id }}">戻る</a>
            </div>
    </x-app-layout>
</html>