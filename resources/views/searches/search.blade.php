@extends('layouts.app')　　　　　　　　　　　　　　　　　　

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <form method="GET" action="/searches/search">
            <input type="search" placeholder="キーワードを入力" name="search" value="@if(isset($search)) {{ $search }} @endif">
            <button type="submit">検索</button>
            <button>
                <a href="/" class="text-white">クリア</a>
            </button>
        </form>
        
        <div class="bar-graph-content">
            <h2 class="graph-title">月ごとの枚数グラフ</h2>
            <div class="bar-graph-wrap vertical">
                @foreach ($months as $month) 
                <div class="graph blue" style="left: {{ $month[3] }}%; height: {{ $month[2] }}%; background: {{ $month[4] }};">
                    <span class="name">{{ $month[0] }}月</span>
                    <span class="number">{{ $month[1] }}</span>
                </div>
                @endforeach
            </div>
        </div>
        
        <!--投稿一覧-->
        @if(count($posts)==0)
        <p>一致する投稿が見つかりませんでした</p>
        @endif
        
        <div class='photos'>
            @foreach ($posts as $post)
            <a href="/posts/{{ $post->id }}">
                <img src="{{ $post->img }}" class="photo">
            </a>
            @endforeach
        </div>
        
        <div class="footer">
            <a href="/">HOME</a>
        </div>
        
        <!--ページネーション-->
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>
@endsection