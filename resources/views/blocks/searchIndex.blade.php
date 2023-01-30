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
                <h1>ホーム</h1>
                <div class='blocks'>
                        <form action="/blocks/searchIndex" method="GET">
                            <input type="date" name="block[fromDate]">
                            <input class="btn" type="submit" value="検索">
                        </form>
                        <div class="wrap">
                            <table class="box box1" border="1">
                            <tr>
                              <th>NE列</th>
                            </tr>
                            @foreach($blocks as $block)
                                @if(!empty($block["NE"]))
                        
                                    @foreach($block["NE"] as $block_NE)
                                        
                                      <tr>
                                            @if($block_NE["search_fig"])
                                          <td style="background-color: #f00; font-size: 12pt;"><a href="/blocks/{{$block_NE["block_id"]}}">{{ $block_NE["name"] }}</a></td>
                                            @else
                                          <td style="background-color: #fff;">{{ $block_NE["name"] }}</td>
                                            @endIf
                                      </tr>
                                    @endforeach
                                @endIf
                            @endforeach
                            </table>
                            
                            <table class="box box2" border="1" >
                            <tr>
                                <th>SE列</th>
                            </tr>
                            @foreach($blocks as $block)
                                @if(!empty($block["SE"]))
                        
                                    @foreach($block["SE"] as $block_SE)
                                        
                                      <tr>
                                            @if($block_SE["search_fig"])
                                          <td style="background-color: #f00; font-size: 12pt;"><a href="/blocks/{{$block_SE["block_id"]}}">{{ $block_SE["name"] }}</a></td>
                                            @else
                                          <td style="background-color: #fff;">{{ $block_SE["name"] }}</td>
                                            @endIf
                                      </tr>
                                    @endforeach
                                @endIf
                            @endforeach
                            </table>
                            
                            <table class="box box3" border="1" >
                            <tr>
                                <th>NW列</th>
                            </tr>
                            @foreach($blocks as $block)
                                @if(!empty($block["NW"]))
                        
                                    @foreach($block["NW"] as $block_NW)
                                        
                                      <tr>
                                            @if($block_NW["search_fig"])
                                          <td style="background-color: #f00; font-size: 12pt;"><a href="/blocks/{{$block_NW["block_id"]}}">{{ $block_NW["name"] }}</a></td>
                                            @else
                                          <td style="background-color: #fff;">{{ $block_NW["name"] }}</td>
                                            @endIf
                                      </tr>
                                    @endforeach
                                @endIf
                            @endforeach
                            </table>
                            
                            <table class="box box4" border="1" >
                            <tr>
                                <th>SW列</th>
                            </tr>
                            @foreach($blocks as $block)
                                @if(!empty($block["SW"]))
                        
                                    @foreach($block["SW"] as $block_SW)
                                        
                                      <tr>
                                            @if($block_SW["search_fig"])
                                          <td style="background-color: #f00; font-size: 12pt;"><a href="/blocks/{{$block_SW["block_id"]}}">{{ $block_SW["name"] }}</a></td>
                                            @else
                                          <td style="background-color: #fff;">{{ $block_SW["name"] }}</td>
                                            @endIf
                                      </tr>
                                    @endforeach
                                @endIf
                            @endforeach
                            </table>
                            
                            
                        </div>

                <a class="btn" href='/'>全体に戻る</a>
                <img src="{{ asset('map.png') }}" alt="">
            </body>
    </x-app-layout>
</html>