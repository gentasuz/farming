<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="{{ asset('/css/style.css')  }}" >
        <title>blog</title>

        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <x-app-layout>
             <body class="antialiased">
                <h1>農作業管理</h1>
                <p>ユーザー名：{{ Auth::user()->name }}</p>
                <a class= "btn" href="posts/create">新規投稿</a>
                <h2>投稿検索</h2>
                <form action="/blocks/searchIndex" method="GET">
                <input type="date" name="block[fromDate]">
                <input class="btn" type="submit" value="この日以降の投稿データを検索">
                <h2>旭川市の天気予報</h2>
                <div class='api'>
                    <table border="1">
                        <tr>
                            <td>日付</td>
                            <td>天気</td>
                            <td>最高気温</td>
                            <td>最低気温</td>
                            <td>0-6時</td>
                            <td>6-12時</td>
                            <td>12-18時</td>
                            <td>18-24時</td>
                        </tr>
                        @foreach($responseBody["forecasts"] as $key =>$data)
                            <tr>
                                <td>{{$data["dateLabel"]}}　{{$data["date"]}}</td>
                                <td>{{$data["telop"]}}<image src="{{$data["image"]["url"]}}" ></image></td>
                                <td>{{$data["temperature"]["max"]["celsius"]}}</td>
                                <td>{{$data["temperature"]["min"]["celsius"]}}</td>
                                <td>{{$data["chanceOfRain"]["T00_06"]}}</td>
                                <td>{{$data["chanceOfRain"]["T06_12"]}}</td>
                                <td>{{$data["chanceOfRain"]["T12_18"]}}</td>
                                <td>{{$data["chanceOfRain"]["T18_24"]}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <h2>最新投稿</h2>
                <table Class='poststable'>
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
                            <a href="/posts/{{ $post->id }}" <h2 Class='title'>{{ $post->start_time }}</h2></a>
                        </td>
                        <td>
                            <small>{{ $post->user->name }}</small>
                        </td>
                        <td>
                            <a href="/works/{{ $post->work->id }}">{{ $post->work->worktype }}</a>
                        </td>
                        <td>
                        @foreach($post->blocks as $block)
                            <a href="/blocks/{{ $block->id }}">{{ $block->name }}</a>
                        @endforeach
                        </td>
                        <td>{{ $post->comment }}</td>
                        <td>
                        <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn" type="button" onclick="deletePost({{ $post->id }})">delete</button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                
                </table>
                
                <div class='paginate'>
                    {{ $posts->links() }}
                </div>
                <img src="{{ asset('map.png') }}" alt="">

                
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