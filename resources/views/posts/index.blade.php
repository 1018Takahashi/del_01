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
    <body class="bg-secondary bg-opacity-25">
        <div class="bg-dark">
            
            <!--検索-->
            <form method="GET" action="/searches/search">
                <input type="search" placeholder="キーワードを入力" name="search">
                <button type="submit">検索</button>
                <button>
                    <a href="/" class="text-white">クリア</a>
                </button>
            </form>
        
            <a href="/searches">検索画面</a>
        
            <!--投稿作成-->
            <p class = "create">[<a href='/posts/create'>create</a>]</p>
        
            <!--投稿一覧-->
            <div class='photos'>
                @foreach ($posts as $post)
                <a href="/posts/{{ $post->id }}">
                    <img src="{{ $post->img }}" class='photo'>
                </a>
                @endforeach
            </div>
            <!--ページネーション-->
            <div class='paginate'>
                {{ $posts->links() }}
            </div>
        </div>
    </body>
</html>
@endsection