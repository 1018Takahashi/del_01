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
        <!--投稿作成-->
        <p class = "create">[<a href='/posts/create'>create</a>]</p>
        
        
        <div class="bar-graph-content m-5">
            <h2 class="graph-title text-center m-2 ">焦点距離の枚数グラフ</h2>
            <div class="bar-graph-wrap vertical" style="max-width: 40%;">
                @foreach ($f_lengths as $f_length) 
                <div class="graph color" style="width: 60px; left: {{ $f_length[3] }}%; height: {{ $f_length[2] }}%; background: {{ $f_length[4] }};">
                    <span class="name">{{ $f_length[0] }}</span>
                    <span class="number">{{ $f_length[1] }}</span>
                </div>
                @endforeach
            </div>
        </div>
        
        <!--投稿一覧-->
        <div class='photos'>
            @foreach ($posts as $post)
            <a href="/posts/{{ $post->id }}">
                <img src="{{ $post->img }}" class='photo'>
            </a>
            @endforeach
        </div>
        
        <div class="footer">
            <a href="/categories">BACK</a>
        </div>
        
        <!--ページネーション-->
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
    </body>
</html>
@endsection