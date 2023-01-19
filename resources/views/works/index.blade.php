<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>blog</title>

        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <x-app-layout>
        <-slot name="header">
            index    
        </-slot>
             <body class="antialiased">
                <h1>Blog Name</h1>
                <a href="posts/create">create</a>
                <div Class='posts'>
                    @foreach($posts as $post)
                    <a href="/posts/{{ $post->id}}" <h2 Class='title'>{{ $post->start_time }}</h2></a>
                    <small>{{ $post->user->name }}</small>
                    <a href="/works/{{ $post->work->id}}">{{ $post->work->worktype }}</a>
                    <a href="/blocks/{{ $post->block->id}}">{{ $post->block->name }}</a>
                    <p Class='body'>{{ $post->comment }}</p>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
                    </form>
                    @endforeach
                </div>
                {{ Auth::user()->name }}
                <div class='paginate'>
                    {{ $posts->links() }}
                </div>
                <a href='/'>全体に戻る</a>
                <script>
                    function deletePost(id) {
                        'use strict'
                        
                        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                            document.getElementById(`form_${id}`).submit();
                        }
                    }
                </script>
            </body>
    </x-app-layout>
   
</html>