<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
        <title>作業内容別投稿</title>

        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <x-app-layout>
             <body class="antialiased">
                <h1>{{$work->worktype}}の投稿データ</h1>
                <table class="poststable" border="1">
                    <tr>
                        <th>開始時間</th>
                        <th>作業者</th>
                        <th>作業内容</th>
                        <th>作業場所</th>
                        <th>コメント</th>
                        <th>投稿削除</th>
                    </tr>
                    @foreach($posts as $post)
                    <tr>
                        <td>
                            <a href="/posts/{{ $post->id}}" <h2 Class='title'>{{ $post->start_time }}</h2></a>
                        </td>
                        <td>
                            <p>{{ $post->user->name }}</p>
                        </td>
                        <td>
                            <a href="/works/{{ $post->work->id}}">{{ $post->work->worktype }}</a>
                        </td>
                        <td>
                            @foreach($post->blocks as $block)
                                    {{ $block->name}}
                            @endforeach
                        </td>
                        <td>
                            <p Class='body'>{{ $post->comment }}</p>
                        </td>
                        <td>
                            <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class='btn' type="button" onclick="deletePost({{ $post->id }})">delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div class='paginate'>
                    {{ $posts->links() }}
                </div>
                <a class="btn" href='/'>全体に戻る</a>
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