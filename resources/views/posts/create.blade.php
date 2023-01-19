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
            create
        </-slot>
        <body class="antialiased">
            <h1>Blog Name</h1>
            <form action="{{ route('store') }}" method="POST">
                @csrf
                <div class='title'>
                    <h2>開始時間</h2>
                    <input type='datetime-local' name='post[start_time]' value={{ old('post.start_time' )}}>
                    <a class='title__error' style="color:red">{{ $errors->first('post.start_time')}}</a>
                    <h2>終了時間</h2>
                    <input type='datetime-local' name='post[end_time]' value={{ old('post.end_time')}}>
                    <a class='title__error' style="color:red">{{ $errors->first('post.end_time')}}</a>
                </div>
                <div class='body'>
                    <h2>comment</h2>
                    <textarea name="post[comment]" placeholder="サンプルテキスト" >{{old('post.comment')}}</textarea>
                    <a class='title__error' style="color:red">{{ $errors->first('post.comment')}}</a>
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
                <input type="submit" value="store">
            </form>
            <div class='footer'>
                <a href="/">戻る</a>
            </div>
    </x-app-layout>
</html>
