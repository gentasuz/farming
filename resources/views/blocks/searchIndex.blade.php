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
                <form action="/blocks/searchIndex" method="GET">
                    <input type="date" name="block[fromDate]">
                    <input type="submit" value="検索">
                </form>

                
                {{dd($block_filter)}}

                </div>
                <a href='/'>全体に戻る</a>
            </body>
    </x-app-layout>
</html>