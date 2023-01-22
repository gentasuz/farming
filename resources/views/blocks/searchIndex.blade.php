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
                <div class='blocks'>
                    <table border="1">
                        <tr>
                          <th>ブロック名称</th>
                        <form action="/blocks/searchIndex" method="GET">
                            <input type="date" name="block[fromDate]">
                            <input type="submit" value="検索">
                        </form>
                        </tr>
                        @foreach ($block_filter as $filter)
                            <tr>
                                @if($filter["search_fig"] == "true")
                                  <td style="background-color: #f00; font-size: 12pt;">{{ $filter["name"] }}</td>
                                @else
                                  <td style="background-color: #fff;">{{ $filter["name"] }}</td>
                                @endIf
                            </tr>
                        @endforeach
                     </table>   

                <a href='/'>全体に戻る</a>
            </body>
    </x-app-layout>
</html>